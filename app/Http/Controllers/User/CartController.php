<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class CartController extends Controller
{

public function AddToCart(Request $request ,$id)
{

   if (!$request->size || !$request->color_code) {
        return back()->with('error', 'Please select size and color');
    }

    $user_id = Auth::user()->id;
    $product_id = decrypt($id);

    if ($user_id && $product_id) {

        $size = $request->size;
        $colorData = $request->color_code;

        $color_code = null;
        $color_name = null;

        if ($colorData && strpos($colorData, '|') !== false) {
            [$color_code, $color_name] = explode('|', $colorData);
        }

        $product = DB::table('products')->where('id', $product_id)->first();

        $cart = DB::table('carts')
            ->where('product_id', $product_id)
            ->where('user_id', $user_id)
            ->where('size', $size)
            ->where('color_code', $color_code)
            ->first();

        if ($cart) {

            $newQuantity = $cart->quantity + 1;
            $newTotalPrice = $newQuantity * $product->price;

            DB::table('carts')
                ->where('id', $cart->id)
                ->update([
                    'quantity' => $newQuantity,
                    'total_price' => $newTotalPrice,
                    'updated_at' => now(),
                ]);

        } else {

            DB::table('carts')->insert([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'size' => $size,
                'color_code' => $color_code,
                'color_name' => $color_name,
                'quantity' => 1,
                'price' => $product->price,
                'total_price' => $product->price,
                'created_at' => now(),
            ]);
        }

        return redirect()->route('User.CartPage')
       ->with('success', 'Your product has been added successfully!');
    }

    return "not added";
}




public function Wishlist($id)
{
    $user_id = Auth::user()->id;
    $product_id = decrypt($id);  

    // Check already exists
    $exists = DB::table('wishlist')
        ->where('user_id', $user_id)
        ->where('product_id', $product_id)
        ->exists();

    if ($exists) {

        return redirect()->back()->with('error', 'Product already added in wishlist!');
    }

    $product = DB::table('products')
                    ->where('id', $product_id)
                    ->first();

    // Insert data
    $data = [
        'user_id'       =>   $user_id,
        'product_id'    =>   $product_id,
        'product_name'  =>   $product->product_name,
        'price'         =>   $product->price,
        'image'         =>   $product->image,
        'About_product' =>   $product->About_product,
        'created_at'    =>   now(),
        'updated_at'    =>   now(),
    ];

    DB::table('wishlist')->insert($data);

    return redirect()->back()->with('success', 'Product added to wishlist successfully!');
}


public function WishlistPage()
{
    
     $user_id = Auth::user()->id;
     $user_image = DB::table('users')->where('id', $user_id)->first(); 

    $Wishlist = DB::table('wishlist')
        ->where('user_id',$user_id)
        ->get();
 

    return view('User.WishlistPage', compact('Wishlist','user_image'));
}


public function WishlistDelete($id)
{
    DB::table('wishlist')->where('id', $id)->delete();
    return redirect()->back()->with('success', 'Deleted Successfully!');
}




public function CartPage()
{
    $user_id = Auth::id();

    $cartsproducts = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $user_id)
        ->select(
            'carts.*',
            'products.product_name',
            'products.image'
        )
        ->get();




       // ✅ Total price (price * qty)
    $Cart_count = DB::table('carts')
        ->where('user_id', $user_id)
        ->sum(DB::raw('price * quantity'));

    return view('User.CartPage', compact('cartsproducts', 'Cart_count'));
}







}

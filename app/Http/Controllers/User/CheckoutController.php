<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class CheckoutController extends Controller
{
    
public function checkout( Request $request)
{
    

    $userId = Auth::user()->id;
  

    $size = $request->size;
    $color = $request->color;

    $address = DB::table('addressess')->where('user_id', $userId)->get();

        $cartsproducts = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userId)
        ->select(
            'carts.*',
            'products.product_name',
            'products.image'
        )
        ->get();
    
    
     $count = Auth::check() 
    ? DB::table('products')->where('id', Auth::id())->count() 
    : 0;

        $Cart_count = DB::table('carts')
        ->where('user_id', $userId)
        ->sum(DB::raw('price * quantity'));
    
    return view('User.checkout', compact( 'address','count','cartsproducts','Cart_count'));
}

public function Saveaddress(Request $request, )
{
    $user_id = Auth::user()->id;
    

    $rules = [
        'f_name'         => 'required|string',
        'l_name'         => 'required|string',
        'email'          => 'required|email',
        'phone'          => 'required|digits:10',
        'first_Address'  => 'required|string|min:5|max:255',
        'second_Address' => 'nullable|string|min:5|max:255',
        'city'           => 'required|string',
        'state'          => 'required|string',
        'post_code'      => 'required|digits:6',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json([
            'status_code' => 2,
            'message' => $validator->errors()->first()
        ]);
    }

    // max 3 address check
    $addressCount = DB::table('addressess')
        ->where('user_id', $user_id)
        ->count();

    if ($addressCount >= 3) {
        return response()->json([
            'status_code' => 2,
            'message' => 'You can only save up to 3 addresses'
        ]);
    }

    $data = [
        'user_id'        => $user_id,
        'f_name'         => $request->f_name,
        'l_name'         => $request->l_name,
        'email'          => $request->email,
        'phone'          => $request->phone,
        'first_Address'  => $request->first_Address,
        'second_Address' => $request->second_Address,
        'city'           => $request->city,
        'state'          => $request->state,
        'post_code'      => $request->post_code,
        'created_at'     => now(),
        'updated_at'     => now(),
    ];

    $result = DB::table('addressess')->insert($data);

    if ($result) {
        return response()->json([
            'status_code' => 1,
            'message' => 'Address saved successfully',
            'redirect_url' => route('User.checkout')
        ]);
    } else {
        return response()->json([
            'status_code' => 0,
            'message' => 'Something went wrong, please try again'
        ]);
    }
}





public function AddressEdit($id)
{
   $Edit = DB::table('addresses')->where('id', $id)->first();
   return view('User.AddressEdit', compact('Edit',));
}




public function AddressUpdate(Request $request)
{
    $rules = [
        'f_name'         => 'required|string|max:255',
        'l_name'         => 'required|string|max:255',
        'email'          => 'required|email|max:255',
        'phone'          => 'required|digits:10',
        'first_Address'  => 'required|string|min:5|max:255',
        'second_Address' => 'nullable|string|min:5|max:255',
        'city'           => 'required|string|max:100',
        'state'          => 'required|string|max:100',
        'post_code'      => 'required|digits:6',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $userId = Auth::user()->id;

    $data = [
        'f_name'         => $request->f_name,
        'l_name'         => $request->l_name,
        'email'          => $request->email,
        'phone'          => $request->phone,
        'first_Address'  => $request->first_Address,
        'second_Address' => $request->second_Address,
        'city'           => $request->city,
        'state'          => $request->state,
        'post_code'      => $request->post_code,
        'updated_at'     => now(),
    ];

    $result = DB::table('addresses')
                ->where('id', $request->id)
                ->where('user_id', $userId)        // Security ke liye zaroori
                ->update($data);

    if ($result > 0) {
return redirect()->route('User.checkout', [
    'id' => $request->product_id
])->with('success', 'Address updated successfully');
    } else {
        return redirect()->back()
                         ->with('error', 'Something went wrong! Address not updated.');
    }
}





public function CartPageDelete($id)
{
    $cart_id = decrypt($id); // ✅ important

    DB::table('carts')
        ->where('id', $cart_id)
        ->delete();

    return redirect()->back()->with('success', 'Deleted Successfully!');
}


public function PluseButton($id)
{
    if (!Auth::check()) {
        return redirect()->back();
    }

    $cart_id = decrypt($id); // ✅ ab cart id

    // Direct cart find karo
    $data = DB::table('carts')->where('id', $cart_id)->first();

    if (!$data) {
        return redirect()->back();
    }

    // Product nikalo
    $product = DB::table('products')
        ->where('id', $data->product_id)
        ->first();

    if (!$product) {
        return redirect()->back();
    }

    // Update quantity
    $newQuantity = $data->quantity + 1;
    $newTotalPrice = $newQuantity * $product->price;

    DB::table('carts')
        ->where('id', $cart_id)
        ->update([
            'quantity' => $newQuantity,
            'total_price' => $newTotalPrice,
            'updated_at' => now(),
        ]);

    return redirect()->back();
}




public function MinusButton($id)
{
    $userId = Auth::user()->id;
    $cartId = decrypt($id);

    if ($userId && $cartId) {

        $data = DB::table('carts')
            ->where('user_id', $userId)
            ->where('id', $cartId)
            ->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Cart item not found');
        }

        // ✅ If quantity = 1 → delete
        if ($data->quantity == 1) {

            DB::table('carts')->where('id', $data->id)->delete();
            return redirect()->back()->with('success', 'Item removed');

        } else {

            $product = DB::table('products')
                ->where('id', $data->product_id)
                ->first();

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }

            $newQuantity = $data->quantity - 1;
            $newTotalPrice = $newQuantity * $product->price;

            DB::table('carts')
                ->where('id', $data->id)
                ->update([
                    'quantity' => $newQuantity,
                    'total_price' => $newTotalPrice,
                    'updated_at' => now(),
                ]);

            return redirect()->back();
        }
    }

    return redirect()->back()->with('error', 'Something went wrong');
}




public function Order(Request $request)
{
    $user_id = Auth::user()->id;

    // ✅ validation
    $rules = [
        'address_id' => 'required'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return back()->with('error', 'Please select your Address');
    }

    // ✅ cart check
    $cart = DB::table('carts')
        ->where('user_id', $user_id)
        ->get(); 

    //    dd($cart);
    if (!$cart) {
        return back()->with('error', 'Cart is empty');
    }
    

    // ✅ insert order
    // DB::table('orders')->insert([
    //     'carts_id'   => $cart->id,
    //     'product_id' => $cart->product_id,
    //     'quantity'   => $cart->quantity,
    //     'total_price'=> $cart->total_price,
    //     'user_id'    => $user_id,
    //     'address_id' => $request->address_id,
    //     'status'     => 'pending',
    //     'created_at' => now(),
    //     'updated_at' => now(),
    // ]);
// dd($cart);
    foreach ($cart as $item) {
     $orders = DB::table('orders')->insert([
        'product_id' => $item->product_id,  
        'quantity'   => $item->quantity,
        'price'   => $item->price,
        'total_price'=> $item->total_price,
        'user_id'    => $user_id,
        'address_id' => $request->address_id,
        'status'     => 'pending',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

// dd($orders);

  DB::table('carts')->where('user_id', $user_id)->delete();

  
    // ✅ success + redirect
    return redirect()->route('User.checkoutComplete')
        ->with('success', 'Your Order submitted successfully');
}



public function checkoutComplete()
{
    return view('User.checkoutComplete');
}




public function Userprofile(Request $request)
{

$rules = [

      'image'    =>  'required|image|mimes:jpg,jpeg,png,webp|max:2048',

 ];
       $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){

       return redirect()->back()->withErrors($validator)->withInput();
      }


      if($request->hasFile('image')){
    $img1 = $request->file('image');
    $photo1 = 'image_' . uniqid() . '.' . $img1->getClientOriginalExtension();
    $img1->move(public_path('uploads/image'), $photo1);
    $imgLink1 = 'uploads/image/' . $photo1;
}

    $data = [
          'image'             => $imgLink1,

    ];

     $result = DB::table('userprofile')->insert($data);

     if($result > 0){
        return "succefull update";
     }

}



public function UpdateAccount(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:100',
        'email'   => 'required|email',
        'mobile'  => 'required|digits:10',
        'address' => 'nullable|max:255',
    ]);


    $update = DB::table('users')
        ->where('id', Auth::id())
        ->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'mobile'     => $request->mobile,
            'address'    => $request->address,
            'updated_at' => now(),
        ]);


    if($update){
        return back()->with(
            'success',
            'Profile updated successfully'
        );
    }

    return back()->with(
        'error',
        'No changes made'
    );
}

public function UpdateImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $user_id = Auth::id();

    if($request->hasFile('image'))
    {
        $image = $request->file('image');
        $imageName = 'image_'.time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('uploads/image'), $imageName);

        DB::table('users')
            ->where('id',$user_id)
            ->update([
                'image' => 'uploads/image/'.$imageName
            ]);

        return redirect()->back()->with('success','Profile Image Updated Successfully');
    }

    return redirect()->back()->with('error','Image not selected');
}




public function UserOrderList()
{
        $user_id = Auth::user()->id;

$order = DB::table('orders')
    ->join('users', 'orders.user_id', '=', 'users.id')
    ->join('products', 'orders.product_id', '=', 'products.id')
    ->where('orders.user_id', Auth::id()) // only current logged in user orders
    ->select(
        'orders.*',
        'users.name as user_name',
        'users.email',

        'products.product_name',
        'products.image as product_image',
    )
   
    ->get();

    $user_image = DB::table('users')->where('id', $user_id)->first(); 
    return view('User.UserOrderList', compact('user_image','order'));
}


























}

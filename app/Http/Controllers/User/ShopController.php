<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;


class ShopController extends Controller
{

public function shopsingle($id)

{
   
    $id = decrypt($id);
    
        $shopsingles = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->leftJoin('carts', 'products.id', '=', 'carts.product_id') // cart join
            ->where('products.id', $id)
            ->select(
                'products.*', 
                'category.category',
                'carts.quantity as cart_quantity' // quantity from cart
            )
            ->first();

        $relatedProducts = DB::table('products')
        ->where('category_id', $shopsingles->category_id)
        ->where('id', '!=', $shopsingles->id) // current product remove
        ->limit(4) // kitne dikhane hain
        ->get();    

    return view('User.shopsingle', compact('shopsingles','relatedProducts'));
   
}

public function Shop(Request $request)
{
    $category = DB::table('category')->get();

    $sales = DB::table('products')
                ->distinct()
                ->pluck('About_product');

    $query = DB::table('products');

    if($request->category){
        $query->where('category_id',$request->category);
    }

    if($request->about){
        $query->where('About_product',$request->about);
    }

    $shop = $query->get();

    return view('User.Shop',compact('shop','category','sales'));
}


public function Contact()
{
  return view('User.Contact');
}



public function GetMessage(Request $request)
{
    $rules = [
        'name'    => 'required|string|max:100',
        'email'   => 'required|email|max:150|unique:message,email',
        'subject' => 'required|string|max:200',
        'message' => 'required|string|max:1000',
    ];

    $validator = Validator::make($request->all(), $rules);

    // ❌ Validation Fail
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator) // errors pass karega
            ->withInput()
            ->with('error', 'Validation Error! Please check your data');
    }

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at' => now(),
        'updated_at' => now(),
    ];

    $result = DB::table('message')->insert($data);

    // ✅ Success
    if ($result) {
        return redirect()->back()->with('success', 'Message Sent Successfully!');
    } else {
        return redirect()->back()->with('error', 'Something went wrong!');
    }
}


public function ShopList(Request $request)
{
    $category = DB::table('category')->get();

    $query = DB::table('products');

    // Category filter
    if($request->category){
        $query->where('category_id',$request->category);
    }

    $product = $query->get();   // yaha variable ka naam product rakho

    return view('User.ShopList', compact('category','product'));
}





}

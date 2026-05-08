<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{

public function home()
{ 
    $TrendingItems = DB::table('products')->get();
    $product = DB::table('products')
    ->orderBy('price', 'asc')   
    ->limit(5)
    ->get()
    ->sortBy('price');

  $category = DB::table('category as c')
    ->join('products as p', 'c.id', '=', 'p.category_id')
    ->select(
        'c.id',
        'c.category',
        DB::raw('MIN(p.price) as price'),

        DB::raw('(SELECT image FROM products 
                  WHERE category_id = c.id 
                  ORDER BY price ASC LIMIT 1) as product_image'),

        DB::raw('(SELECT second_image FROM products 
                  WHERE category_id = c.id 
                  ORDER BY price ASC LIMIT 1) as second_image'),

        DB::raw('(SELECT third_image FROM products 
                  WHERE category_id = c.id 
                  ORDER BY price ASC LIMIT 1) as third_image'),

        DB::raw('(SELECT id FROM products 
                  WHERE category_id = c.id 
                  ORDER BY price ASC LIMIT 1) as product_id')
    )
    ->groupBy('c.id', 'c.category')
    ->get();

    

    $count = Auth::check() 
    ? DB::table('wishlist')->where('user_id', Auth::id())->count() 
    : 0;

    
    $Cart_count = Auth::check() 
    ? DB::table('carts')->where('user_id', Auth::id())->count() 
    : 0;

    $clients = DB::table('clients')->get();
  

    return view('User.home', compact('product', 'category','TrendingItems','count','Cart_count','clients'));
}

public function About()
{
     
    return view('User.About');
}


public function Account()
{
    $user_id = Auth::user()->id;

    $user_image = DB::table('users')->where('id', $user_id)->first(); 

   $userdetails = DB::table('users')->where('id', $user_id)->first(); 
    return view('User.Account',compact('userdetails','user_image'));
}

public function shopgrid($id)
{
  

    $product = DB::table('products')->where('category_id',$id)
    ->get();
    return view('User.shopgrid', compact('product'));
}


public function UserLogout()
{
    Auth::logout();
    return redirect()->route('User.Login');
}

public function help()
{
    return view('User.help');
}

public function terms()
{
    return view('User.terms');
}

public function privacy()
{
    return view('User.privacy');
}


public function returnpolicy()
{
    return view('User.returnpolicy');
}







}

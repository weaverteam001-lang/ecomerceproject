<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\User\HomeController;
use  App\Http\Controllers\User\AuthController;
use  App\Http\Controllers\User\ShopController;
use  App\Http\Controllers\User\CartController;
use  App\Http\Controllers\User\CheckoutController;


require base_path('routes/Admin.php');

Route::middleware(['User'])->group(function (){  
Route::get('Wishlist/{id}' , [CartController::class, 'Wishlist'])->name('User.Wishlist');
Route::get('WishlistPage' , [CartController::class, 'WishlistPage'])->name('User.WishlistPage');
Route::get('WishlistDelete/{id}' , [CartController::class, 'WishlistDelete'])->name('User.WishlistDelete');
Route::post('AddToCart/{id}' , [CartController::class, 'AddToCart'])->name('User.AddToCart');
Route::get('CartPage',[CartController::class, 'CartPage'])->name('User.CartPage');
Route::get('CartPageDelete/{id}' , [CheckoutController::class, 'CartPageDelete'])->name('User.CartPageDelete');
Route::get('PluseButton/{id}' , [CheckoutController::class, 'PluseButton'])->name('User.PluseButton');
Route::get('MinusButton/{id}' , [CheckoutController::class, 'MinusButton'])->name('User.MinusButton');
Route::get('Account' , [HomeController::class, 'Account'])->name('User.Account');
Route::post('UserLogout' , [HomeController::class, 'UserLogout'])->name('User.UserLogout');
Route::post('Saveaddress' , [CheckoutController::class, 'Saveaddress'])->name('User.Saveaddress');
Route::get('AddressEdit/{id}' , [CheckoutController::class, 'AddressEdit'])->name('User.AddressEdit');
Route::post('AddressUpdate' , [CheckoutController::class, 'AddressUpdate'])->name('User.AddressUpdate');
Route::post('Order' , [CheckoutController::class, 'Order'])->name('User.Order');
Route::get('checkoutComplete' , [CheckoutController::class, 'checkoutComplete'])->name('User.checkoutComplete');
Route::get('checkout',[CheckoutController::class, 'checkout'])->name('User.checkout');
Route::post('Userprofile',[CheckoutController::class, 'Userprofile'])->name('User.Userprofile');
Route::post('UpdateAccount',[CheckoutController::class, 'UpdateAccount'])->name('User.UpdateAccount');
Route::post('UpdateImage',[CheckoutController::class, 'UpdateImage'])->name('User.UpdateImage');
Route::get('UserOrderList',[CheckoutController::class, 'UserOrderList'])->name('User.UserOrderList');




 });


Route::get('/',[HomeController::class, 'home'])->name('User.home');
Route::get('About' , [HomeController::class, 'About'])->name('User.About');
Route::get('shopgrid/{id}' , [HomeController::class, 'shopgrid'])->name('User.shopgrid');
Route::get('shopsingle/{id}' , [ShopController::class, 'shopsingle'])->name('User.shopsingle');
Route::get('Shop' , [ShopController::class, 'Shop'])->name('User.Shop');
Route::get('Contact' , [ShopController::class, 'Contact'])->name('User.Contact');
Route::get('Register' , [AuthController::class, 'Register'])->name('User.Register');
Route::post('Registration' , [AuthController::class, 'Registration'])->name('User.Registration');
Route::get('Login' , [AuthController::class, 'Login'])->name('User.Login');
Route::post('GetLogin' , [AuthController::class, 'GetLogin'])->name('User.GetLogin');
Route::post('GetMessage' , [ShopController::class, 'GetMessage'])->name('User.GetMessage');
Route::get('help' , [HomeController::class, 'help'])->name('User.help');
Route::get('terms' , [HomeController::class, 'terms'])->name('User.terms');
Route::get('privacy' , [HomeController::class, 'privacy'])->name('User.privacy');
Route::get('returnpolicy' , [HomeController::class, 'returnpolicy'])->name('User.returnpolicy');
Route::get('ShopList',[ShopController::class, 'ShopList'])->name('User.ShopList');


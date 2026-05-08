
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

Route::prefix('Admin')->group(function(){
    
Route::get('Login' ,     [DashboardController::class, 'Login'])->name('Admin.Login');
Route::post('GetLogin' , [DashboardController::class, 'GetLogin'])->name('Admin.GetLogin');

Route::middleware(['Admin'])->group(function (){  

// Route::get('Dashboard' , [DashboardController::class, 'Dashboard'])->name('Admin.Dashboard');
Route::get('category' , [CategoryController::class, 'category'])->name('Admin.category');
Route::post('Getcategory' , [CategoryController::class, 'Getcategory'])->name('Admin.Getcategory');
Route::get('Deletecategory/{id}' , [CategoryController::class, 'Deletecategory'])->name('Admin.Deletecategory');
Route::get('Editcategory/{id}' , [CategoryController::class, 'Editcategory'])->name('Admin.Editcategory');
Route::post('Updatecategory' , [CategoryController::class, 'Updatecategory'])->name('Admin.Updatecategory');
Route::get('Subcategory' , [CategoryController::class, 'Subcategory'])->name('Admin.Subcategory');
Route::post('GetSubcategory' , [CategoryController::class, 'GetSubcategory'])->name('Admin.GetSubcategory');
Route::get('DeleteSubcategory/{id}' , [CategoryController::class, 'DeleteSubcategory'])->name('Admin.DeleteSubcategory');
Route::get('EditSubcategory/{id}' , [CategoryController::class, 'EditSubcategory'])->name('Admin.EditSubcategory');
Route::post('UpdateSubcategory' , [CategoryController::class, 'UpdateSubcategory'])->name('Admin.UpdateSubcategory');
Route::get('Product' , [ProductController::class, 'Product'])->name('Admin.Product');
Route::get('AddProduct' , [ProductController::class, 'AddProduct'])->name('Admin.AddProduct');
Route::post('GetProduct' , [ProductController::class, 'GetProduct'])->name('Admin.GetProduct');
Route::get('EditProduct/{id}' , [ProductController::class, 'EditProduct'])->name('Admin.EditProduct');
Route::get('changeCategoryState/{id}' , [CategoryController::class, 'changeCategoryState'])->name('Admin.changeCategoryState');
Route::get('changeSubCategoryState/{id}' , [CategoryController::class, 'changeSubCategoryState'])->name('Admin.changeSubCategoryState');
Route::get('DeleteProduct/{id}' , [ProductController::class, 'DeleteProduct'])->name('Admin.DeleteProduct');
Route::get('changeProductState/{id}' , [ProductController::class, 'changeProductState'])->name('Admin.changeProductState');
Route::get('DeleteOrder/{id}' , [ProductController::class, 'DeleteOrder'])->name('Admin.DeleteOrder');
Route::get('message' , [ProductController::class, 'message'])->name('Admin.message');
Route::get('Deletemessage/{id}' , [ProductController::class, 'Deletemessage'])->name('Admin.Deletemessage');

Route::get('orders' , [ProductController::class, 'orders'])->name('Admin.orders');
Route::get('pendingorder' , [ProductController::class, 'pendingorder'])->name('Admin.pendingorder');
Route::get('Confirmed' , [ProductController::class, 'Confirmed'])->name('Admin.Confirmed');
Route::get('Cancelled' , [ProductController::class, 'Cancelled'])->name('Admin.Cancelled');
Route::get('Client' , [ProductController::class, 'Client'])->name('Admin.Client');
Route::post('GetClient' , [ProductController::class, 'GetClient'])->name('Admin.GetClient');
Route::get('DeleteClient/{id}' , [ProductController::class, 'DeleteClient'])->name('Admin.DeleteClient');
Route::get('EditClient/{id}' , [ProductController::class, 'EditClient'])->name('Admin.EditClient');
Route::post('UpdateClient' , [ProductController::class, 'UpdateClient'])->name('Admin.UpdateClient');
 
Route::get('/order-status/{id}/{status}', [ProductController::class, 'changeStatus'])->name('Admin.order.status.change');
Route::get('Productapi' , [ProductController::class, 'Productapi'])->name('Admin.Productapi');

});
});
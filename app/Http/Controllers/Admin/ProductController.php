<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
class ProductController extends Controller
{

public function Product()
{
   {
    $product = DB::table('products')
    ->join('category','products.category_id', '=','category.id')
    ->select(
      'products.*',
      'category.category as category_name',
    )
    ->get();
   
   return view('Admin.Product',compact('product'));
  }
 
}

public function AddProduct()
{
    $category = DB::table('category')->get();
    return view('Admin.AddProduct', compact('category'));
}

public function GetProduct(Request $request)
{
    
    $rules = [
        'image'            =>  'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'second_image'     =>  'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'third_image'      =>  'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'product_name'     =>  'required|string' ,
        'price'            =>  'required|integer',
        'discount'         =>  'required|integer',
        'size'             =>  'nullable|array'  ,
        'color_name'       =>  'nullable|array'  ,
        'color_code'       =>  'nullable|array'  ,
        'category_id'      =>  'required|string' ,
        'stock'            =>  'required|integer',
        'brand'            =>  'nullable|string' ,
        'sku'              =>  'nullable|string' ,
        'tags'             =>  'nullable|string' ,
        'About_product'    =>  'nullable|string' ,
        'old_price'        =>  'nullable|string' ,
        'description'      =>  'required|string' ,
        'full_description' =>  'required|string' ,
   
     ];
      
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){

       return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
      }
      
     // First Image
if($request->hasFile('image')){
    $img1 = $request->file('image');
    $photo1 = 'image_' . uniqid() . '.' . $img1->getClientOriginalExtension();
    $img1->move(public_path('uploads/image'), $photo1);
    $imgLink1 = 'uploads/image/' . $photo1;
}

// Second Image
if($request->hasFile('second_image')){
    $img2 = $request->file('second_image');
    $photo2 = 'second_image_' . uniqid() . '.' . $img2->getClientOriginalExtension();
    $img2->move(public_path('uploads/image'), $photo2);
    $imgLink2 = 'uploads/image/' . $photo2;
}

// Third Image
if($request->hasFile('third_image')){
    $img3 = $request->file('third_image');
    $photo3 = 'third_image_' . uniqid() . '.' . $img3->getClientOriginalExtension();
    $img3->move(public_path('uploads/image'), $photo3);
    $imgLink3 = 'uploads/image/' . $photo3;
}


    $data = [
          'image'             => $imgLink1,
          'second_image'      => $imgLink2,
          'third_image'       => $imgLink3,
          'product_name'      => $request->product_name,
          'price'             => $request->price,
          'discount'          => $request->discount,
          'size'              => json_encode($request->size),
          'color_name'        => json_encode($request->color_name),
          'color_code'        => json_encode($request->color_code),
          'category_id'       => $request->category_id,
          'stock'             => $request->stock,
          'brand'             => $request->brand,
          'sku'               => $request->sku,
          'tags'              => $request->tags,
          'About_product'     => $request->About_product,
          'old_price'         => $request->old_price,
          'description'       => $request->description,
          'full_description'  => $request->full_description,
          'status'            => 1,
          'created_at'        =>  now(),
          'updated_at'        =>  now(),
    ] ; 

    $result = DB::table('products')->insert($data);
  
    if($result > 0){

         return response()->json(['status_code' => 1, 'message' => 'Product Add Successfully', 'redirect_url' => route('Admin.Product')]);
    }else{

        return response()->json(['status_code' => 0, 'message' => ' Product Add Some Errors']);
    }
}

public function EditProduct($id)
{
    $Edit = DB::table('products')->where('id' , $id)->first();
    return view('Admin.EditProduct', compact('Edit'));
}

public function DeleteProduct($id)
{
    $Delete = DB::table('products')->where('id' , $id)->delete();
    return redirect()->back();
}
  
public function changeProductState($id)
{
        $categoryid = Crypt::decrypt($id);
        $category = DB::table('products')->where('id',$categoryid)->first();
        if($category){
            $newstatus = $category->status == 1 ? 0 : 1;
            $update = DB::table('products')->where('id',$categoryid)->update(['status'=>$newstatus]);
            if($update>0){
                return redirect()->back();
            }
        }
}

public function orders()
{
    $order = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->join('addresses', 'orders.address_id', '=', 'addresses.id') 
        ->select(
            'orders.*',
            'users.name as user_name',
            'users.email',

            'products.product_name',
            'products.image as product_image',

            // 'carts.price',

            'addresses.phone',
            'addresses.city',
            'addresses.state',
            'addresses.post_code',
            'addresses.first_Address',
            'addresses.second_Address',
        )
        ->get();

    return view('Admin.orders', compact('order'));
}

public function DeleteOrder($id)
{
    $delete = DB::table('orders')->where('id',$id)->delete();

    if($delete){
        return redirect()->back()->with('success', 'Your Order Deleted Successfully');
    }else{
        return redirect()->back()->with('error', 'Something went wrong');
    }
}


public function message()
{
    $messages = DB::table('message')->get();
    return view('Admin.message',compact('messages'));
}

public function Deletemessage($id)
{
    $Delete = DB::table('message')->where('id', $id)->delete();
    return redirect()->back();
}


public function pendingorder()

{
$order = DB::table('orders')
    ->join('users','orders.user_id','=','users.id')
    ->join('products','orders.product_id','=','products.id')
    ->join('addressess','orders.address_id','=','addressess.id')

    ->where('orders.status','Pending')

    ->select(
        'orders.*',
        'users.name as user_name',
        'users.email',

        'products.product_name',
        'products.image as product_image',

        'addressess.phone',
        'addressess.city',
        'addressess.state',
        'addressess.post_code',
        'addressess.first_Address',
        'addressess.second_Address'
    )
    ->latest()
    ->get();

return view('Admin.pendingorder',compact('order'));
}


public function changeStatus($id,$status)
{
    $orderId = Crypt::decrypt($id);

    DB::table('orders')
        ->where('id','=',$orderId)
        ->limit(1)
        ->update([
            'status'=>$status,
            'updated_at'=>now()
        ]);

    return back()->with('success','Order status updated');
}



public function Confirmed()
{
   $order = DB::table('orders')
    ->join('users','orders.user_id','=','users.id')
    ->join('products','orders.product_id','=','products.id')
    ->join('addressess','orders.address_id','=','addressess.id')

    ->where('orders.status','Confirmed')

    ->select(
        'orders.*',
        'users.name as user_name',
        'users.email',

        'products.product_name',
        'products.image as product_image',

        'addressess.phone',
        'addressess.city',
        'addressess.state',
        'addressess.post_code',
        'addressess.first_Address',
        'addressess.second_Address'
    )
    ->latest()
    ->get();

return view('Admin.Confirmed',compact('order'));
}


public function Cancelled()

{
   $order = DB::table('orders')
    ->join('users','orders.user_id','=','users.id')
    ->join('products','orders.product_id','=','products.id')
    ->join('addressess','orders.address_id','=','addressess.id')

    ->where('orders.status','Cancelled')

    ->select(
        'orders.*',
        'users.name as user_name',
        'users.email',

        'products.product_name',
        'products.image as product_image',

        'addressess.phone',
        'addressess.city',
        'addressess.state',
        'addressess.post_code',
        'addressess.first_Address',
        'addressess.second_Address'
    )
    ->latest()
    ->get();

return view('Admin.Cancelled',compact('order'));
}



public function Client()
{
    $clients = DB::table('clients')->get();
    return view('Admin.Client',compact('clients'));
}

public function GetClient(Request $request)
{
    $rules = [
         'client_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
         'client_name'  => 'required|string',
         'details'     =>   'required|string',
    ];

          $validator = Validator::make($request->all(), $rules);
      if($validator->fails()){

        return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
      }


     if($request->hasFile('client_image')){
                $img1 = $request->file('client_image');
                $photo1 = 'image_' . uniqid() . '.' . $img1->getClientOriginalExtension();
                $img1->move(public_path('uploads/image'), $photo1);
                $imgLink1 = 'uploads/image/' . $photo1;
            }

      $data = [
           'client_image'  => $imgLink1,
           'client_name'   =>$request->client_name,
           'details'      =>$request->details,
            'created_at'        =>  now(),
          'updated_at'        =>  now(),

      ];

      $result = DB::table('clients')->insert($data);

     if($result > 0){
           return response()->json(['status_code' => 1,'message' => ' Client Add Successfull']);

      }else{
          return response()->json(['status_code' => 0, 'message' => ' Client Add Some Errors']);
      }
}


public function DeleteClient($id)
{
    $Delete = DB::table('clients')->where('id', $id)->delete();

    if($Delete){

        return redirect()->back()->with('success', 'Your Client Deleted Successfully');
      }else{

        return redirect()->back()->with('error', 'Something went wrong');
    }
}

public function EditClient($id)
{
    $Edit = DB::table('clients')->where('id', $id)->first();
    return view('Admin.EditClient', compact('Edit'));
}

public function UpdateClient(Request $request)
{
    $rules = [
        'client_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'client_name'  => 'required|string',
        'details'      => 'required|string',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
    }

    $client = DB::table('clients')->where('id', $request->id)->first();

    $imgLink1 = $client->client_image;

    if ($request->hasFile('client_image')) {

        // old image delete
        if ($client->client_image && file_exists(public_path($client->client_image))) {
            unlink(public_path($client->client_image));
        }

        $img1 = $request->file('client_image');
        $photo1 = 'image_' . uniqid() . '.' . $img1->getClientOriginalExtension();
        $img1->move(public_path('uploads/image'), $photo1);

        $imgLink1 = 'uploads/image/' . $photo1;
    }

    $data = [
        'client_image' => $imgLink1,
        'client_name'  => $request->client_name,
        'details'      => $request->details,
        'updated_at'   => now(),
    ];

  $result =  DB::table('clients')->where('id', $request->id)->update($data);

        if($result > 0){
           return response()->json(['status_code' => 1,'message' => ' Update Client Successfull']);

      }else{
          return response()->json(['status_code' => 0, 'message' => ' Update Client Some Errors']);
      }
}


public function Productapi()
{
   
   return view('Admin.Productapi');
}


}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class ProductController extends Controller
{
     public function Product()
    {
        $product = DB::table('products')
            ->join('category','products.category_id','=','category.id')
            ->select(
                'products.*',
                'category.category as category_name'
            )
            ->get();

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }


    public function Registration(Request $request)
{

        $rules = [
            'name'                  =>   'required|string',
            'email'                 =>   'required|email|unique:users,email',
            'password'              =>   'required|min:6|confirmed',
            'mobile' => 'required|digits:10',
            'password_confirmation' =>   'required|min:6',
           
           

        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json(['status_code'=> 2, 'message' => $validator->errors()->first()]);
        }

            $imageName = null;

    if($request->hasFile('image')){
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(
            public_path('uploads/image'),
            $imageName
        );
    }


        $data = [

             'user_type'    => 0,
             'user_details' => 'User',
             'name'         => $request -> name,
             'email'        => $request -> email,
             'mobile'        => $request -> mobile,
             'password'     => Hash::make($request->password),
             'created_at'   =>  now(),
             'updated_at'   =>  now(),
        
        ];

        $Result = DB::table('users')->insert($data);

        if($Result){
                
            return response()->json(['status_code' => 1, 'message' => 'Ragister Succesfull' ,  'redirect_url' => route('User.Login')]);
            
            }else{
                return response()->json(['status_code' => 0, 'message' => 'Invelid User']);
            }

}
 
}

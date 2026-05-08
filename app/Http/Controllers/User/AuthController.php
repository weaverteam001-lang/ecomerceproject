<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
public function Register()
{
        return view('User.Register');
}

public function Registration(Request $request)
{

        $rules = [
            'name'                  =>   'required|string',
            'email'                 =>   'required|email|unique:users,email',
            'password'              =>   'required|min:6|confirmed',
             'mobile' => 'required|digits:10',
            'password_confirmation' =>   'required|min:6',
            'image'                 =>    'nullable|image',
             'address'               =>    'nullable',

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
             'image'      => $imageName,
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


public function Login()
{
        return view('User.Login');
}

    
public function GetLogin(Request $request)
{
    $rules = [
        'email' => 'required|string',
        'password' =>  'required|min:6',
    ];

      $validator = Validator::make($request->all() , $rules);

        if($validator->fails()){
                return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
            }


     $credetials = $request->only('email', 'password');
     
             if(Auth::attempt($credetials)){
            $user = Auth::user();
     
        if($user->user_type == 0){
           $redirect_url = route('User.home');
         return response()->json(['status_code' => 1,'message' => 'Login Successful','redirect_url' => $redirect_url]);

        }else{
                Auth::logout();
                return response()->json(['status_code' => 0, 'message' => ' credetaials accces']);
        }
       }
             return response()->json(['status_code' => 2, 'message' => 'Invelid acces']);
}


 }
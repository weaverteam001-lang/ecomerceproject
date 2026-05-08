<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function Dashboard()
{
        
  return view('Admin.Dashboard');

}

public function Login()
{
        return view('Admin.Login');
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

             if($user->user_type == 1){
           $redirect_url = route('Admin.Dashboard');
         return response()->json(['status_code' => 1,'message' => 'Login Successful','redirect_url' => $redirect_url]);
        
        }else{
                Auth::logout();
                return response()->json(['status_code' => 0, 'message' => ' credetaials accces']);
         }
       }

          return response()->json(['status_code' => 2, 'message' => 'Invelid acces']);
}


 }
 
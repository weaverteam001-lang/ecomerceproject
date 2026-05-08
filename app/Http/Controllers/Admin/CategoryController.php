<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
public function category()
{
        $category = DB::table('category')->get();
        return view('Admin.category' , compact('category'));
}


public function Getcategory(Request $request)
{
        $rules = [
      
         'category'=> 'required|unique:category',

      ];
            $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
            return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
      }
            $data = [
      
                'category'=>$request->category,
                'status'=>1,
                'created_at' => now(),
                'updated_at' => now(),
       ];

          $result = DB::table('category')->insert($data);

      if($result > 0){
       return response()->json(['status_code' => 1,'message' => 'Category Add Successful']);
      }else{
          return response()->json(['status_code' => 0, 'message' => ' Category Add Some Errors']);
      }
}

public function Deletecategory($id)
{

      $delete = DB::table('category')->where('id' , $id)->delete();
        
            return redirect()->back();
}

public function Editcategory($id)
{

            $edit = DB::table('category')->where('id' , $id)->first();
            return view('Admin.Editcategory' , compact('edit'));

}


public function Updatecategory(Request $request)
{
                
            $rules = [
        
            'category'=> 'required|string',

        ];
                $validator = Validator::make($request->all(), $rules);


        if($validator->fails()){
            return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
        }
                $data = [
        
                    'category'=>$request->category,
                    
        ];

    $result = DB::table('category')->where('id', $request->id)->update($data);

    if($result){
    return response()->json([
                'status_code' => 1,
                'message' => 'Category Updated Successfully',
                'redirect_url' => route('Admin.category') // 👈 ye add karo
            ]);
    }else{
    
            return response()->json([
                'status_code' => 0,
                'message' => 'Something went wrong or no changes made'
            ]);
           }
}

public function Subcategory()
{
     $category = DB::table('category')->get();


     $allsubcategory = DB::table('subcategory')
    ->join('category', 'subcategory.category_id', '=', 'category.id')
    ->select(
        'subcategory.id',
        'category.category',
        'subcategory.subcategory',
        'subcategory.status',
        'subcategory.created_at',
        'subcategory.updated_at'
    )
    ->get();



     return view('Admin.Subcategory' , compact('category' ,'allsubcategory'));
}

public function GetSubcategory(Request $request)
{
   $rules = [
        
         'category_id' => 'required|integer',
          'subcategory' => 'required|unique:subcategory',

        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
                return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
                return redirect()->back()->withErrors($validator)->withInput();
        }
                $data = [
        
                    'category_id'=>$request->category_id,
                    'subcategory' =>$request->subcategory,
                    'status'=>1,
                    'created_at' => now(),
                    'updated_at' => now(),
          ];
            $result = DB::table('subcategory')->insert($data);

            if($result > 0){
            return response()->json(['status_code' => 1,'message' => 'SubCategory Add Successful']);
            
            }else{
                return response()->json(['status_code' => 0, 'message' => ' SCategory Add Some Errors']);
            }
}

public function DeleteSubcategory($id)
{
    $Delete = DB::table('subcategory')->where('id' , $id)->delete();
    return redirect()->back();
}      

public function EditSubcategory($data)
{
    $Edit = DB::table('subcategory')->where('id', $data)->first();
    return view('Admin.EditSubcategory' , compact('Edit'));
}

public function UpdateSubcategory(Request $request)
{
    
     $rules = [
         'subcategory' => 'required|string',

     ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
                return response()->json(['status_code' =>2, 'message' => $validator->errors()->first()]);
                return redirect()->back()->withErrors($validator)->withInput();
        }
         $data = [

             'subcategory' =>$request->subcategory,
          ];

         $result = DB::table('subcategory')->where('id', $request->id)->update($data);

         if($result > 0){
            return response()->json(['status_code' => 1, 'message' => 'SubCategory Updated Successfully', 'redirect_url' => route('Admin.Subcategory') // 👈 ye add karo
        ]);
            
         }else{
                return response()->json(['status_code' => 0, 'message' => ' SubCategory Add Some Errors']);
            }
}

public function changeCategoryState($id)
{
        $categoryid = Crypt::decrypt($id);
        $category = DB::table('category')->where('id',$categoryid)->first();
        if($category){
            $newstatus = $category->status == 1 ? 0 : 1;
            $update = DB::table('category')->where('id',$categoryid)->update(['status'=>$newstatus]);
            if($update>0){
                return redirect()->back();
            }
        }
}

public function changeSubCategoryState($id)
{
        $categoryid = Crypt::decrypt($id);
        $category = DB::table('subcategory')->where('id',$categoryid)->first();
        if($category){
            $newstatus = $category->status == 1 ? 0 : 1;
            $update = DB::table('subcategory')->where('id',$categoryid)->update(['status'=>$newstatus]);
            if($update>0){
                return redirect()->back();
            }
        }
}


 }











            
    
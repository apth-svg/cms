<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BoloController extends Controller
{
    public function writepost(){
        return view('post.writepost');
    }
    public function addcategory(){
        return view('post.add_category');
    }
    public function storecategory(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:2',
            'slug' => 'required|unique:categories|max:25|min:2',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if($category){
            $notification=array(
                'message'=>'Successfull Category Insert',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else {
            $notification=array(
                'message'=>'Something Wrong',
                'alert-type'=>'fail'
            );
            return Redirect()->back()->with($notification);
        }
        // return response()->json($data);
    }

    public function allcategory(Request $request){
        $category=DB::table('categories')->get();
        return view('post.all_category',compact('category'));
        // return response()->json($category);
    }
    public function viewcategory($id){
        $category=DB::table('categories')->where('id',$id)->first();
        return view('post.categoryview')->with('cat',$category);
        // return response()->json($category);
    }
    public function deletecategory($id){
        $delete=DB::table('categories')->where('id',$id)->delete();
        if($delete){
            $notification=array(
                'message'=>'Successfull Category Delete',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function editcategory($id){
        $category=DB::table('categories')->where('id',$id)->first();
        return view('post.edit_category',compact('category'));
    }

    public function updatecategory(Request $request,$id){

        $validatedData = $request->validate([
            'name' => 'required|max:25|min:2',
            'slug' => 'required|max:25|min:2',
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id',$id)->update($data);
        if($category){
            $notification=array(
                'message'=>'Successfull Category Update',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else {
            $notification=array(
                'message'=>'Nothing to Update',
                'alert-type'=>'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }
}

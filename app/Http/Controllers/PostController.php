<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function writePost(){
        $category=DB::table('categories')->get();
        return view('post.writepost',compact('category'));
    }
    public function storePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:25|min:2',
            'details' => 'required',
            'image'=>'required',
        ]);
        $data=array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if($image){
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Successfull Post Insert',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification=array(
                'message'=>'Something Wrong',
                'alert-type'=>'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function allpost(){
        // $posts=DB::table('posts')->get();
        $posts=DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->get();
        return view('post.allpost',compact('posts'));
        // return response()->json($posts);
    }
   public function viewpost($id){
        $posts=DB::table('posts')
            ->join('categories','posts.category_id','categories.id')
            ->select('posts.*','categories.name')
            ->where('posts.id',$id)
            ->first();
            return view('post.viewpost')->with('post',$posts);
   }
   public function deletepost($id){
       $posts=DB::table('posts')->where('id',$id)->first();
       $image=$posts->image;
        $delete=DB::table('posts')->where('id',$id)->delete();
        if($delete){
            unlink($image);
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
   public function editpost($id){
       $category=DB::table('categories')->get();
      $post=DB::table('posts')->where('id',$id)->first();
      return view('post.edit_post',compact('category','post'));
   }
   public function updatepost(Request $request,$id){
     $validatedData = $request->validate([
        'title' => 'required|max:25|min:2',
        'details' => 'required',
        'image'=>'mimes:jpeg,jpg,png,PNG |max:1000',
    ]);
    $data=array();
    $data['title']=$request->title;
    $data['category_id']=$request->category_id;
    $data['details']=$request->details;
    $image=$request->file('image');
    if($image){
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/frontend/image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        unlink($request->old_photo);

        DB::table('posts')->where('id',$id)->update($data);
        $notification=array(
            'message'=>'Successfull Post Update',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.post')->with($notification);
    }else{
        $data['image']=$request->image;
        DB::table('posts')->where('id',$id)->update($data);
        $notification=array(
            'message'=>'Successfull Post Update',
            'alert-type'=>'success'
        );
        return Redirect()->route('all.post')->with($notification);
    }
   }
}

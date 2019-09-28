<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('admin.blog',[
           'blogs' => $blogs
        ]);
    }


    protected function blogValidation(Request $request){
        $this->validate($request,[
            'blog_name'  =>  'required|regex:/(^([a-zA-Z _]+)(\d+)?$)/u|max:20|min:3',
            'blog_image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }
    public function addBlog(Request $request){
        $this->blogValidation($request);

        $image       = $request->file('blog_image');
        $image_ex    = $image->getClientOriginalExtension();
        $imageName   = date('YMDHis.').$image_ex;
        $directory   = 'blog-images/';
        $image->move($directory,$imageName);

          $blog = new Blog();
          $blog->blog_name       =   $request->blog_name;
          $blog->blog_image      =   $directory.$imageName;
          $blog->save();
          return redirect('/blog')->with('message','Successfully Blog Save');
    }

}

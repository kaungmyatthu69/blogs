<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index(){
        return view('admin.blogs.index',[
            'blogs'=>Blog::latest()->paginate(6)
        ]);
    }
    public function create(){
        return view('admin.blogs.create',[
            'categories'=>Category::all(),
            
        ]);
    }
    public function store(){


  $formdata=request()->validate([
            "title" => 'required|min:3|max:255',
            "slug" => ["required",Rule::unique('blogs','slug')],
            "intro" => "required",
            "body" => "required",
            "category_id" => ["required",Rule::exists('categories','id')]
        ]);

        $formdata['user_id']=auth()->id();
        $formdata['thumbnails']= request('image')->store('thumbnails');
        Blog::create($formdata);
        return redirect('/');
    }
    public function destory(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success',"Delete successful");

    }
    public function edit(Blog $blog){
        return view('admin.blogs.edit',[
            'categories'=>Category::all(),
            "blog"=>$blog

        ]);
    }
    public function update(Blog $blog){

        $formdata=request()->validate([
                  "title" => 'required|min:3|max:255',
                  "slug" => ["required",Rule::unique('blogs','slug')->ignore("$blog->id")],
                  "intro" => "required",
                  "body" => "required",
                  "category_id" => ["required",Rule::exists('categories','id')]
              ]);

              $formdata['user_id']=auth()->id();
              $formdata['thumbnails']=request('image')?request('image')->store('thumbnails'):$blog->thumbnails;

              $blog->update($formdata);
              return redirect('/');
    }
}

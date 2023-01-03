<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index() {

        return view('blogs.index',[
            'blogs'=>Blog::latest()->filter(request(['search','category','author']))
                                    ->paginate(6)
                                    ->withQueryString()
            
        ]);
    }

    public function show(Blog $blog){
        return view('blogs.show',[
            'blog'=> $blog,
            'randomblogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);

    }
    public function subscription(Blog $blog){
        if(User::find(auth()->user()->id)->isSubscribed($blog)){
            $blog->unSubscribe();


        }else{
            $blog->subscribe();
        }
        return redirect()->back();
    }

}

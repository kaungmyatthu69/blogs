<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){

       $commentdata= request()->validate([
            'body'=>'required|min:5',
        ]);
        //mail
        $subscribers=($blog->subscribers->filter(fn($subscriber)=>$subscriber->id!==auth()->id()));

       $subscribers->each(function($subscriber) use($blog) {

           Mail::to($subscriber->email)->queue(new SubscribeMail($blog));
       });
        $blog->comments()->create(['user_id'=>auth()->id(),'body'=>$commentdata['body']]);
        return redirect('/blogs/'.$blog->slug);
    }
}

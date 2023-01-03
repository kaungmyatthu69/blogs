<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $with = ['category', 'author'];
    protected $guarded = ['id'];
    public function scopeFilter($query,$filter)
    {
        $query->when($filter['search']??false,function($query,$search)
        {
            $query->where(function($query)use($search){

                $query->where('title','like','%'.$search.'%')
                      ->orwhere('body','like','%'.$search.'%');
            });
        });

        $query->when($filter['category']??false,function($query,$slug)
        {
            $query->wherehas('category',function($query) use($slug){
                $query->where('slug',$slug);
            });

        });
        $query->when($filter['author']??false,function($query,$author){
            $query->wherehas('author',function($query) use($author){
                $query->where('username',$author);
            });
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function subscribers(){
        return $this->belongsToMany(User::class,'user_blog');
    }
    public function subscribe(){
        $this->subscribers()->attach(auth()->id());
    }
    public function unSubscribe(){
        $this->subscribers()->detach(auth()->id());
    }
}

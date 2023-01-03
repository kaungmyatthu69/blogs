<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
       $Formdata= request()->validate([
            'name'=>'required|min:3|max:255',
            'email'=>['required','email',Rule::unique('users','email')],
            'username'=>['required',Rule::unique('users','username')],
            'password'=>'required|min:5'
        ]);


        $user=User::create($Formdata);
        auth()->login($user);
        return redirect('/')->with('success','Welcome Dear '.$user->name);
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Bye Bye');
    }
    public function login(){
        return view('auth.login');
    }
    public function post_login(){
       $formdata= request()->validate([
            'email'=>['required','min:3','max:255','email',Rule::exists('users','email')],
            'password'=>['required','min:5','max:255']
        ],[
            'email.required'=>'plz fill email',
            'password.min'=>'password should be more than 5 characters'
        ]);

        if(auth()->attempt($formdata)){
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
            }else{

                return redirect('/')->with('success','Welcome back' ,auth()->user()->name);
            }
        }else{
            return redirect()->back()->withErrors([
                'password'=>'Incorrect password'
            ]);
        }
    }
}

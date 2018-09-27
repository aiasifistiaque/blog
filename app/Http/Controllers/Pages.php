<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages extends Controller
{
    public function index(){
        return view('Pages.index');
    }

    public function signup(){
        return view('Pages.signup');
    }

    public function login(){
        return view('Pages.login');
    }

    public function log(){
        return view('Pages.log');
    }

    public function form(){
        $title='sign up';
        return view('Pages.form',['pageTitle'=>$title]);
    }

    public function write(){
        $title='create post';
        return view('Pages.createPost',['pageTitle'=>$title]);
    }

    public function dashboard(){
        $title='create post';
        return view('Pages.dashboardv2',['pageTitle'=>$title]);
    }
}

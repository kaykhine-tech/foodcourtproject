<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class FrontendController extends Controller
{
    public function home(){
        $categories = Category::all();
        return view('frontend.home', compact('categories'));
        
    }

    public function about(){
        return view('frontend.about');
        
    }

    public function contact(){
        return view('frontend.contact');
        
    }
}

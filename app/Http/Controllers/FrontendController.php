<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class FrontendController extends Controller
{
    public function home(){
        $categories = Category::all();
        $items = Item::all();
        $dis_items = Item::where('discount','!=','null')->get();
        // dd($dis_items);
        return view('frontend.home', compact('categories','items', 'dis_items'));
        
    }

    public function about(){
        return view('frontend.about');
        
    }

    public function contact(){
        return view('frontend.contact');
        
    }

    public function cart(){
        return view('frontend.cart');
        
    }


    public function menu(){
        $items = Item::all();
        $menufilter = Item::where('category_id', '!=', 'null')->get();
        //dd($menufilter);
        return view('frontend.menu', compact('items','menufilter'));
        
    }

    public function category(Request $request, $id){
        //dd ($id);
        $categoryfilter = Item::where('category_id',$id)->get();
        //dd($categoryfilter);
        return view('frontend.categorydetail',compact('categoryfilter'));

    }


}

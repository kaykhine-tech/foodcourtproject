<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function home(){
        $categories = Category::all();
        $items = Item::all();
        $dis_items = Item::where('discount','!=','null')->get();
        // dd($dis_items);
<<<<<<< HEAD
        $start = '9:00:00';
        $end   = '18:00:00';
=======
        $start = '09:00:00';
        $end   = '23:00:00';
>>>>>>> 426577097e175da1ddeffea81f3310d978fb852f
        $now   = Carbon::now('Asia/Yangon');
        
        $time  = $now->format('H:i:s');

        if ($time >= $start && $time <= $end) {
            $nows="ShowAddtocart";
            return view('frontend.home', compact('categories','items', 'dis_items','nows'));         
            
        }else{
            $nows="Noshow";
            return view('frontend.home', compact('categories','items', 'dis_items','nows'));       
        }

        
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
        // $id = $request->id;
        $items = Item::all();
        $categories = Category::all();
        // $menulist = Item::where('category_id',1)->get();
        // $menulist1 = Item::where('category_id',2)->get();
        $menufilter = Item::where('category_id', '!=', 'null')->get();
        //dd($menufilter);
<<<<<<< HEAD
        $start = '9:00:00';
        $end   = '18:00:00';
=======
        $start = '09:00:00';
        $end   = '23:00:00';
>>>>>>> 426577097e175da1ddeffea81f3310d978fb852f
        $now   = Carbon::now('Asia/Yangon');
        
        $time  = $now->format('H:i:s');

        if ($time >= $start && $time <= $end) {
            $nows="ShowAddtocart";
            return view('frontend.menu', compact('items', 'menufilter', 'categories', 'nows'));         
            
        }else{
            $nows="Noshow";
            return view('frontend.menu', compact('items', 'menufilter', 'categories', 'nows'));       
        }

        
    }

    public function category(Request $request, $id){
        //dd ($id);
        $categoryfilter = Item::where('category_id',$id)->get();
        //dd($categoryfilter);
<<<<<<< HEAD
        $start = '9:00:00';
        $end   = '18:00:00';
=======
        $start = '09:00:00';
        $end   = '23:00:00';
>>>>>>> 426577097e175da1ddeffea81f3310d978fb852f
        $now   = Carbon::now('Asia/Yangon');
        
        $time  = $now->format('H:i:s');

        if ($time >= $start && $time <= $end) {
            $nows="ShowAddtocart";
            return view('frontend.categorydetail',compact('categoryfilter', 'nows'));         
            
        }else{
            $nows="Noshow";
            return view('frontend.categorydetail',compact('categoryfilter', 'nows'));       
        }


    }

    // public function menulist(Request $request, $id){
    //     $menulistfilter = Item::where('category_id', $id)->get();
    //     //dd($menufilter);
    //     return view('frontend.menu', compact('menulistfilter'));
        
    // }


}

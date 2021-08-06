<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // public function __construct($value='')
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // dd($categories);
        // Log::info("Hello Aung Nyi!!!");
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // validation
        $request->validate([
            'name' => 'required|unique:categories',
            'photo' => 'image'
        ]);

        // upload file
        if($request->file()){

            // 1665003670_290012.png
            $fileName = rand().'_'.$request->photo->getClientOriginalName();

            // categoryimg/1665003670_290012.png
            $filePath = $request->file('photo')->storeAs('categoryimg',$fileName,'public');

            // $path = '/storage/'.$filePath;
        }else{
            $filePath = 'categoryimg/category.png';
        }

        // data insert
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $filePath;
        $category->save();

        // redirect
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request);

        // validation
        $request->validate([
            'name' => 'required',
            'photo' => 'sometimes|image'
        ]);

        // upload file
        if($request->file()){          

            // 1665003670_290012.png
            $fileName = rand().'_'.$request->photo->getClientOriginalName();

            // categoryimg/1665003670_290012.png
            $filePath = $request->file('photo')->storeAs('categoryimg',$fileName,'public');

            // delete old photo

            // if($category->photo!='/storage/categoryimg/category.png'){
            //     $old_photo = str_replace('/storage', '', $category->photo);
            //     Storage::delete('/public'.$old_photo);

            if($category->photo!='categoryimg/category.png'){
                Storage::delete('/public/'.$category->photo);

                // unlink(public_path('storage/').$category->photo);
            }
        }else{
            $filePath = $category->photo;
        } 

        // data update
        $category->name = $request->name;
        $category->photo = $filePath;
        $category->save();

        // redirect
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {        

        foreach($category->items as $item){

            if($item->photo!='itemimg/item.png'){
                Storage::delete('/public/'.$item->photo);
            }

            $item->delete();
        }

        if($category->photo!='categoryimg/category.png'){
            Storage::delete('/public/'.$category->photo);
        }
        $category->delete();

        return redirect()->route('categories.index');
    }
}

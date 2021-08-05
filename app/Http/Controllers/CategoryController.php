<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

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
            'name' => 'required|unique:categories'
        ]);

        // upload file
        if($request->file()){

            // 1665003670_290012.png
            $fileName = rand().'_'.$request->photo->getClientOriginalName();

            // categoryimg/1665003670_290012.png
            $filePath = $request->file('photo')->storeAs('categoryimg',$fileName,'public');

            $path = '/storage/'.$filePath;
        }

        // data insert
        $category = new Category;
        $category->name = $request->name;
        if($request->file()){
            $category->photo = $path;
        }else{
            $path = '/storage/categoryimg/category.png';
            $category->photo = $path;
        }
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
            'name' => 'required'
        ]);

        // upload file
        if($request->file()){

            // 1665003670_290012.png
            $fileName = rand().'_'.$request->photo->getClientOriginalName();

            // categoryimg/1665003670_290012.png
            $filePath = $request->file('photo')->storeAs('categoryimg',$fileName,'public');

            $path = '/storage/'.$filePath;

            // delete old photo
            // if(){
            //     Storage::delete('/public/categoryimg/'.);
            // }
        }else{
            $path = $category->photo;
        }

        // data update
        $category->name = $request->name;
        $category->photo = $path;
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
        $category->delete();
        foreach($category->items as $item){
            $item->delete();
        }
        return redirect()->route('categories.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        // dd($items);
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
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
            'name' => 'required|unique:items',
            'photo' => 'image',
            'code_no' => 'required|unique:items',
            'price' => 'required|numeric|gt:0',
            'discount' => 'nullable|numeric|gt:0'
        ]);

        // upload file
        if($request->file()){

            // 1665003670_290012.png
            $fileName = rand().'_'.$request->photo->getClientOriginalName();

            // itemimg/1665003670_290012.png
            $filePath = $request->file('photo')->storeAs('itemimg',$fileName,'public');
        }else{
            $filePath = 'itemimg/item.png';
        }

        // data insert
        $item = new Item; // create new object
        $item->code_no = $request->code_no;
        $item->name = $request->name;
        $item->photo = $filePath;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->save();

        // redirect
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.item.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // dd($request);

        // validation
        $request->validate([
            'name' => [
                'required',
                Rule::unique('items')->ignore($item->id)
            ],
            'code_no' => [
                'required',
                Rule::unique('items')->ignore($item->id)
            ],
            'photo' => 'image',
            'price' => 'required|numeric|gt:0',
            'discount' => 'nullable|numeric|gt:0'
        ]);

        // upload file
        if($request->file()){

            // 1665003670_290012.png
            $fileName = rand().'_'.$request->photo->getClientOriginalName();

            // itemimg/1665003670_290012.png
            $filePath = $request->file('photo')->storeAs('itemimg',$fileName,'public');

            Log::info("Phogo $item->photo");

            // delete old photo
            if($item->photo!='itemimg/item.png'){
                Storage::delete('/public/'.$item->photo);
            }
        }else{
            $filePath = $item->photo;
            Log::info("Test $filePath");
        }

        // data update
        $item->code_no = $request->code_no;
        $item->name = $request->name;
        $item->photo = $filePath;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->save();

        // redirect
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if($item->photo!='itemimg/item.png'){
                Storage::delete('/public/'.$item->photo);
            }
        
        $item->delete();

        // redirect
        return redirect()->route('items.index');
    }
}

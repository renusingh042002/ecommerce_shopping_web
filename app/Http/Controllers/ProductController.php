<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $getProduct = Product::withTrashed()->get();
        return view('products.show',compact('getProduct','request'));
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileArray = [];
        if($request->hasFile('documents'))
        {
            foreach($request->file('documents') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $filename = $image->getClientOriginalName();
                $path = "images/";
                $image->move($path, $filename);

                $fileArray[] = $filename;
            }
            $fileArray = json_encode($fileArray);
        }

        $addProduct = new Product;
        $addProduct->name = trim($request->name);
        $addProduct->category = $request->category;
        $addProduct->size = $request->size;
        $addProduct->price = $request->price;
        $addProduct->description = trim($request->description);
        $addProduct->images = $fileArray;
        $addProduct->save();

        return redirect()->route('products.index')
        ->with('success','product created successfully');
}



    
    public function edit(Request $request,$id){
        $product = Product::find($id);
        return view('products.edit',compact('product','request'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $editProduct = Product::find($id);
        $fileArray = [];
        if($request->hasFile('documents'))
        {
            foreach($request->file('documents') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $filename = $image->getClientOriginalName();
                $path = "images/";
                $image->move($path, $filename);

                $fileArray[] = $filename;
            }
            $fileArray = json_encode($fileArray);
        }else{
            $fileArray = $editProduct->images;
        }

        $editProduct->name = trim($request->name);
        $editProduct->category = $request->category;
        $editProduct->size = $request->size;
        $editProduct->price = $request->price;
        $editProduct->description = trim($request->description);
        $editProduct->images = $fileArray;
        $editProduct->save();

        return redirect()->route('products.index')
        ->with('success','product updated successfully');
    }
    public function delete(Request $request,$id){
        $deleteProduct = Product::find($id);
        // $deleteProduct->forceDelete();
        $deleteProduct->delete();
        return redirect()->route('products.index')
        ->with('success','product archive successfully');
    }

    public function restore(Request $request,$id){
        $restoreProduct = Product::withTrashed()->find($id);
        $restoreProduct->restore();
        return redirect()->route('products.index')
        ->with('success','product restore successfully');
    }
}

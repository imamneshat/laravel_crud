<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = product::get();

        return view('products.index', ['products'=>$products]);
    }
    
    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2000',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        $product = new product;

        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSucess('Now Product is Created!!');


    }

    public function edit($id){
       
        $product = product::where('id', $id)->first();
        
        return view('products.edit',['product'=>$product]);
    }

    public function update(request $request, $id){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:2000',
        ]);

        $product = product::where('id', $id)->first();
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
       
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSucess('Now Product Updated !!!');
    }

    public function delete($id){
        $product = product::where('id', $id)->first();
        $product->delete();
        return back()->withSucess('Now Product Deleted !!!');
    }
}

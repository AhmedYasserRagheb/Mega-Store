<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::all();
        return view('admin.products.addProduct', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        // $category = new category();
        $product = new product();
        $discount = $request->discount_price;

        $product->title = $request->title;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->category = $request->category;
        $product->price = $request->price;
        if($discount){
            $product->discount_price = $discount;
        }else{
            $product->discount_price = 0;
        }
        $product->quantity = $request->quantity;
        
        // adding image 

        $image = $request->image;
        $imageName = time().".".$image->getClientOriginalName();
        $request->image->move('images', $imageName);
        $product->image = $imageName;

        
        // end image 

        $product->save();
        return redirect()->back()->with(['message' => 'data stored successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        $products= product::all();
        $category = category::all();
        // return $products;
        return view('admin.products.showProducts', compact('products', 'category'));
        // return $products->image;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $item = product::find($request->id);
        
        $item->title = $request->title;
        $item->size = $request->size_;
        $item->color = $request->color;
        $item->category = $request->category;
        $item->price = $request->price;
        $item->discount_price = $request->discount_price;
        $item->quantity = $request->quantity;

        $item->save();

        return redirect()->back();
        // return $item->size;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product=product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with(['message'=> 'successfully deleted']);
        // return $product->$id;
    }
}

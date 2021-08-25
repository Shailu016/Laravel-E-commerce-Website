<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
              'title'=>'required', 
              'excerpt'=>'required', 
              'body'=>'required',
              'price'=>'required',
              'image'=>'mimes:jpg,png,jpeg,webp|max:5048'
             
            ]);
            

            
            if(isset($request->image)) {

                $imagePath = time() . $request->name . '.'. $request->image->extension();
                $request->image->move(public_path('images'), $imagePath);
                
            }
         
            $product = new Product();
            $product->title = request('title');
            $product->excerpt = request('excerpt');
            $product->category_id = request('category_id');
            $product->body = request('body');
            $product->price = request('price');
            $product->image_path = $imagePath ?? null;
            $product->save();
            return redirect('/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = request('title');
        $product->excerpt = request('excerpt');
        $product->price = request('price');
        $product->category_id = request('category_id');
        $product->body = request('body');
        
        if (request()->hasFile('image'))
        {
            $imagePath = time() . $request->name. '.'. $request->image->extension();
            $request->image->move(public_path('images'), $imagePath);
            $oldImagePath = public_path('images') . "\\" . $product->image_path;
            
             if(File::exists($oldImagePath)) 
              {
                 File::delete($oldImagePath);
               }
            $product->image_path = $imagePath;
        }
            $product->save();
            return redirect('/product/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {   
        public_path('images') . "\\" . 
        $product = Product::find($product_id);
        $image_path = public_path('images') . "\\" . $product->image_path;
        File::delete($image_path);
        $product->delete($product_id);
        return redirect('/product');
    }
}

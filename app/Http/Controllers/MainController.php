<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       
        $products = Product::paginate(25);;
        $categories = Category::all();
        return view('main',compact('products','categories'));
    
    }

    
}

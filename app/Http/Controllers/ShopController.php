<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(Request $request){
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();

        $products = Product::where('status', 1);

        $data['categories'] = $categories;
        $data['products'] = $products->get(); // Retrieve the products after filtering

        return view('front.shop', $data);
    }
}

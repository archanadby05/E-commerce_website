<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    public function index(){
        $latestProducts = Product::orderBy('id', 'ASC')->where('status', 1)->take(8)->get();
        $data['latestProducts'] = $latestProducts;
        return view('front.home', $data);
    }
}

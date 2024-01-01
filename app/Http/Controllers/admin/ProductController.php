<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(){
        $data = [];
        $categories = Category::orderBy('name','ASC')->get();
        $data['categories']=$categories;
        return view('admin.products.create', $data);
    }

    public function store(Request $request){

        $rules = [
            'title' => 'required',
            'price' => 'required|numeric',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric'
        ];

        if(!empty($request->track_qty) && $request->track_qty == 'Yes'){
            $rules['qty'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()){
            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->track_qty = $request->track_qty;
            $product->category_id = $request->category;
            $product->status = $request->status;
            $product->qty = $request->qty;
            $product->save();
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
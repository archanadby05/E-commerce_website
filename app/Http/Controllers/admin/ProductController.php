<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->paginate();
        $data['products'] = $products;
        return view('admin.products.list', $data);
    }
    public function create()
    {
        $data = [];
        $categories = Category::orderBy('name', 'ASC')->get();
        $data['categories'] = $categories;
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'price' => 'required|numeric',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric'
        ];

        if (!empty($request->track_qty) && $request->track_qty == 'Yes') {
            $rules['qty'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->track_qty = $request->track_qty;
            $product->category_id = $request->category;
            $product->status = $request->status;

            // Check if 'qty' key exists before assigning
            if ($request->has('qty')) {
                $product->qty = $request->qty;
            }

            $product->save();

            return response()->json([
                'status' => true,
                'message' => 'Product created successfully',
                'redirect' => route('products.index'), // Redirect to the index page
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($id, Request $request)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return redirect()->route('products.index')->with('error', 'Product Not Found');
        }

        $data = [
            'product' => $product,
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ];

        return view('admin.products.edit', $data);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        $rules = [
            'title' => 'required',
            'price' => 'required|numeric',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
        ];

        if (!empty($request->track_qty) && $request->track_qty == 'Yes') {
            $rules['qty'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->track_qty = $request->track_qty;
            $product->category_id = $request->category;
            $product->status = $request->status;

            if ($request->has('qty')) {
                $product->qty = $request->qty;
            }

            $product->save();

            Session::flash('success', 'Product updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Product updated successfully',
                'redirect' => route('products.edit', $product->id),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }


    public function destroy($id, Request $request)
    {
        $product = Product::find($id);

        if (empty($product)) {
            Session::flash('error', 'Product Not Found');
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $product->delete();

        Session::flash('success', 'Product deleted successfully');


        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully'
        ]);
    }
}

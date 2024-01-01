<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(10);
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        if($validator->passes()){

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->save();

            Session::flash('success', 'Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category added successfully'
            ]);

        } else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }
    public function edit($categoryId, Request $request){
        $category=Category::find($categoryId);

        if(empty($category)){
            return redirect()->route('categories.index');
        }

        return view('admin.category.edit', compact('category'));
    }
    public function update($categoryId, Request $request){

        $category=Category::find($categoryId);

        if(empty($category)){
            return response()->json([
                'status'=>false,
                'notFound'=>true,
                'message'=>'Category not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id.',id',

        ]);

        if($validator->passes()){
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = $request->status;
            $category->save();

            Session::flash('success', 'Category updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully'
            ]);

        } else{
            return response()->json([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }
    public function destroy($categoryId, Request $request){
    $category = Category::find($categoryId);

    if (empty($category)) {
        Session::flash('error', 'Category not found');
        return response()->json([
            'status' => true,
            'message' => 'Category not found successfully',
        ]);

    }

    $category->delete();

    Session::flash('success', 'Category deleted successfully');

    return response()->json([
        'status' => true,
        'message' => 'Category deleted successfully',
    ]);
}
}

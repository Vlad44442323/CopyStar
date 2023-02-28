<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $category = new Category();
        $category->name=$request->input('name');
        $category->code=$request->input('code');
        $category->save();
        return redirect()->route('catalog');
    }
    public function settingOne($code)
    {
        $category = Category::where('code', $code)->first();
        return view('admin.setting-one-category',['category'=>$category]);
    }
    public function update($id, Request $request)
    {
        $category = Category::find($id);
        $category->name=$request->input('name');
        $category->code=$request->input('code');
        $category->save();
        return redirect()->route('settingcat');
    }
    public function delete($id)
    {
        $category = Category::find($id)->delete();
        return redirect()->route('settingcat');
    }
    public function addProduct(Request $request)
    {
        $category = Category::all();
        return view('admin.create-product',['category'=>$category]);
    }
    

    public function settingIndex()
    {
        $category = Category::all();
        return view('admin.category-settings',['category'=>$category]);
    }
}

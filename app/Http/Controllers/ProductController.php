<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function main()
    {
        $product = Product::latest()->limit(5)->get();
        return view('Index',['product'=>$product]);
    }
    public function index()
    {
       $product = Product::latest()->get();
       $category = Category::all();
       return view('catalog.index',['product'=>$product,'category'=>$category]);
    }
    public function detail($name)
    {
        $product = Product::where('name',$name)->first();
        return view('catalog.product',['product'=>$product]);
    }
    public function delete($id)
    {
        $product = Product::find($id)->delete();
        return redirect()->back();
    }
    public function category($code)
    {
        $category = Category::all();
        $title =Category::where('code',$code)->first();
        $products = $title->products()->latest()->get();
        return view('catalog.filter',['title'=>$title,'category'=>$category,'products'=>$products]);
        /*dd($category);*/
    }
    public function create(Request $request)
    {
        $product = new Product();
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->desc=$request->input('desc');
        $product->img=$request->file('img')->store('upload', 'public');
        $product->country=$request->input('country');
        $product->year=$request->input('year');
        $product->model=$request->input('model');
        $product->quantity=$request->input('quantity');
        $product->category_id=$request->input('category_id');
        $product->save();
        return redirect()->route('catalog');
    }
    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->desc=$request->input('desc');
        $product->img=$request->file('img')->store('upload', 'public');
        $product->country=$request->input('country');
        $product->year=$request->input('year');
        $product->model=$request->input('model');
        $product->quantity=$request->input('quantity');
        $product->category_id=$request->input('category_id');
        $product->save();
        return redirect()->route('catalog');
    }
    public function updateIndex($id)
    {
        $product = Product::find($id);
        $category= Category::all();
        return view('admin.update-product',['product'=>$product,'category'=>$category]);
    }
}

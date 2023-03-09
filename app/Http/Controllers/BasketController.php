<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\User;
use App\Models\Basket_product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class BasketController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request, $id)
    {
        
        $id_user = Auth::user()->id;
        $id_product = Product::find($id)->id;
        $basket = new Basket();
        $basket->id_user = $request->input('id_user', $id_user);
        $basket->id_product = $request->input('id_product',$id_product);
        $basket->quantity = $request->input('quantity');
        $basket->save();
        return back();
    }
    public function index()
    {   
        $basket = Basket::where('id_user', Auth::user()->id)->get();
       $products = Product::find($basket);
       /* dd($products);*/
        return view('basket.index',['product'=>$products]);

    }
    public function update(Request $request, $id)
    {
        $product = Basket::find($id);
        $product->quantity = $request->input('quantity');
        if ( $product->quantity == 0)
        {
            Basket::find($id)->delete();
        }
        $product->save();
        return back();
    }
    public function delete($id)
    {
        $basket = Basket::find($id)->delete();
        return back();
    }
    
}

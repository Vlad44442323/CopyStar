<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\User;
use App\Models\Basket_product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BasketController extends Controller
{   
    public function add(Request $request, $id)
    {
        $basket = new Basket_product();
        $user_id = Auth::user()->id;
        $product_id = Product::find($id)->id;
        $basket_id  = Basket::create(['user_id' => $user_id])->id;
        $basket->basket_id = $request->input('basket_id', $basket_id);
        $basket->product_id = $request->input('product_id',$product_id);
        $basket->quantity = $request->input('quantity');
        $basket->save();
        return back();
    }
    public function index()
    {    
        $user = Auth::user()->id;
        $products = Basket::where('user_id', $user)->first();
        return view('basket.index',['product'=>$products]);

    }

    
}

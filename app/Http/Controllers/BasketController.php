<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;


class BasketController extends Controller
{
 public function basketIndex($iduser)
 {
    $basket = Basket::where('user_id', $iduser)->first();
    $product=$basket->products;
    return view('basket',['product'=>$product]);
    /*dd($product);*/
 }
}

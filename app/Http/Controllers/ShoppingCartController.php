<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function shoppingCart(){
        $items = 0;
        return view('shoppingCart',compact('items'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function index() {
        $oldCart = Session::get('cart');
        return view('cart.index', compact('oldCart'));
    }

    function addToCart($idProduct) {
        $product = Product::findOrFail($idProduct);
        $cart = [
             "items" => [],
             "totalMoney" => 0,
             "totalQuantity" => 0
        ];

        $oldCart = Session::get('cart');
        // xet cai gio hang k ton
        if (!$oldCart) {
            array_push($cart['items'], $product);
            $cart['totalMoney'] = $product->price;
            $cart['totalQuantity'] = 1;

            // dua du lieu gio hang vao session
            Session::put('cart', $cart);
        } else{
            // gio hang da ton tai

            array_push($oldCart['items'], $product);
            $oldCart['totalMoney'] += $product->price;
            $oldCart['totalQuantity']++;

            Session::put('cart', $oldCart);
        }

        return redirect()->route('cart.index');
    }

    function remove($index) {
        $oldCart = Session::get('cart');
        $productRemove = $oldCart['items'][$index];
        $oldCart['totalQuantity']--;
        $oldCart['totalMoney'] -= $productRemove->price;
        array_splice($oldCart['items'], $index, 1);
        Session::put('cart', $oldCart);
        return back();
    }
}

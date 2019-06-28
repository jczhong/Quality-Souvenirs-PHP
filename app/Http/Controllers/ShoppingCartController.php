<?php

namespace App\Http\Controllers;

use App\ShoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function __construct()
    {
    }

    private function getShoppingCart() {
        $cart = null;
        if (session('cart') == null) {
            $session = uniqid();
            session(['cart' => $session]);
            info('new session:', [$session]);

            $cart = new ShoppingCart;
            $cart->Session = $session;
            $cart->save();
        } else {
            $session = session('cart');
            info('old session:', [$session]);

            //session()->remove('cart');
            $cart = ShoppingCart::where('Session', $session)->first();
        }
        info('get cart:', [$cart]);
        return $cart;
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        $count = $request->input('count');

        if ($id != null && $count != null) {
            $cart = $this->getShoppingCart();
            if ($cart->addToCart($id, $count) == true) {
                if ($request->isMethod('post')) {
                    return response('ok', 200);
                } else {
                    return redirect('cart/show');
                }
            }
        }
        return response('', 404);
    }

    public function show() {
        $cart = $this->getShoppingCart();
        $cartItems = $cart->getCartItems();

        $subTotal = 0.0;
        $gst = 0.0;
        $grandTotal = 0.0;
        $GST = 0.15;

        foreach ($cartItems as $cartItem) {
            $subTotal += $cartItem->souvenir->Price * $cartItem->Count;
        }

        $gst += $subTotal * $GST;
        $grandTotal += $subTotal + $gst;

        return view('shoppingcart',
            ['cartItems' => $cartItems, 'subTotal' => $subTotal, 'gst' => $gst, 'grandTotal' => $grandTotal]);
    }

    public function remove(Request $request) {
        $id = $request->input('id');
        $count = $request->input('count');

        if ($id != null && $count != null) {
            $cart = $this->getShoppingCart();
            $cart->removeFromCart($id, $count);
            return redirect('cart/show');
        }
        return response('', 404);
    }

    public function clean() {
        $cart = $this->getShoppingCart();
        $cart->cleanCart();
        return redirect('cart/show');
    }

    public function count() {
        $cart = $this->getShoppingCart();
        $count = $cart->getCount();

        return response($count, 200);
    }
}

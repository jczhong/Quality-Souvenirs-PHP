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

    public function AddPOST(Request $request)
    {
        $id = $request->input('id');
        $count = $request->input('count');

        if ($id != null && $count != null) {
            $cart = $this->getShoppingCart();
            if ($cart->AddToCart($id, $count) == true) {
                    return response('ok', 200);
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

    public function AddGET(Request $request) {
        $id = $request->input('id');
        $count = $request->input('count');

        if ($id != null && $count != null) {
            $cart = $this->getShoppingCart();
            if ($cart->AddToCart($id, $count) == true) {
                return redirect('ShoppingCart/show');
            }
        }
        return response('', 404);
    }

    public function Remove(Request $request) {
        $id = $request->input('id');
        $count = $request->input('count');

        if ($id != null && $count != null) {
            $cart = $this->getShoppingCart();
            $cart->RemoveFromCart($id, $count);
            return redirect('ShoppingCart/show');
        }
        return response('', 404);
    }

    public function ClearCart() {
        $cart = $this->getShoppingCart();
        $cart->ClearCart();
        return redirect('ShoppingCart/show');
    }

    public function GetCount() {
        $cart = $this->getShoppingCart();
        $count = $cart->GetCount();

        return response($count, 200);
    }

}

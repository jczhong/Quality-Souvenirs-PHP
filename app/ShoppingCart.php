<?php

namespace App;

use App\CartItem;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function cart_items() {
        return $this->hasMany('App\CartItem');
    }

    public function addToCart($id, $count) {
        $product = Product::find($id);
        if ($product != null) {
            $cartItem = CartItem::where('shopping_cart_id', $this->id)
                ->where('product_id', $product->id)
                ->first();
            if ($cartItem == null) {
                info('new Cart Item');
                $cartItem = new CartItem;
                $cartItem->shopping_cart_id = $this->id;
                $cartItem->product_id = $product->id;
                $cartItem->count = $count;
            } else {
                $cartItem->count += 1;
            }
            $cartItem->save();
            info("cartItem:", [$cartItem]);

            return true;
        }
        return false;
    }

    public function removeFromCart($id, $count) {
        $product = Product::find($id);
        if ($product != null) {
            $cartItem = CartItem::where('shopping_cart_id', $this->id)
                ->where('product_id', $product->id)
                ->first();
            if ($cartItem != null) {
                $cartItem->count -= $count;
                if ($cartItem->count <= 0) {
                    $cartItem->delete();
                } else {
                    $cartItem->save();
                }
            }
        }
    }

    public function cleanCart() {
        $cartItems = CartItem::where('shopping_cart_id', $this->id)->get();
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }
    }

    public function getCartItems() {
        $cartItems = CartItem::where('shopping_cart_id', $this->id)->get();
        return $cartItems;
    }

    public function getCount() {
        $count = 0;
        $cartItems = CartItem::where('shopping_cart_id', $this->id)->get();
        foreach ($cartItems as $cartItem) {
            $count += $cartItem->count;
        }

        return $count;
    }
}

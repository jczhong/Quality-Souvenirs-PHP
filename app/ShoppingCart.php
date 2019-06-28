<?php

namespace App;

use App\CartItem;
use App\Souvenir;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function cart_items() {
        return $this->hasMany('App\CartItem', 'ShoppingCartID');
    }

    public function addToCart($id, $count) {
        $souvenir = Souvenir::find($id);
        if ($souvenir != null) {
            $cartItem = CartItem::where('ShoppingCartID', $this->id)
                ->where('SouvenirID', $souvenir->id)
                ->first();
            if ($cartItem == null) {
                info('new Cart Item');
                $cartItem = new CartItem;
                $cartItem->ShoppingCartID = $this->id;
                $cartItem->SouvenirID = $souvenir->id;
                $cartItem->Count = $count;
                $cartItem->DateCreated = Carbon::now();
            } else {
                $cartItem->Count += 1;
            }
            $cartItem->save();
            info("cartItem:", [$cartItem]);

            return true;
        }
        return false;
    }

    public function removeFromCart($id, $count) {
        $souvenir = Souvenir::find($id);
        if ($souvenir != null) {
            $cartItem = CartItem::where('ShoppingCartID', $this->id)
                ->where('SouvenirID', $souvenir->id)
                ->first();
            if ($cartItem != null) {
                $cartItem->Count -= $count;
                if ($cartItem->Count <= 0) {
                    $cartItem->delete();
                } else {
                    $cartItem->save();
                }
            }
        }
    }

    public function cleanCart() {
        $cartItems = CartItem::where('ShoppingCartID', $this->id)->get();
        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }
    }

    public function getCartItems() {
        $cartItems = CartItem::where('ShoppingCartID', $this->id)->get();
        return $cartItems;
    }

    public function getCount() {
        $count = 0;
        $cartItems = CartItem::where('ShoppingCartID', $this->id)->get();
        foreach ($cartItems as $cartItem) {
            $count += $cartItem->Count;
        }

        return $count;
    }
}

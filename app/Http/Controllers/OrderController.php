<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\ShoppingCart;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $orders = null;

        if (Gate::allows('management')) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', $user->id)->get();
        }
        return view('order.index', ['orders' => $orders]);
    }

    public function create()
    {
        $user = Auth::user();
        $address = $user->address;
        $phone = $user->phone;

        return view('order.create', ['address' => $address, 'phone' => $phone]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'bail|required|string|max:30',
            'lastName' => 'bail|required|string|max:30',
            'address' => 'bail|required|string',
            'phone' => 'required|numeric',
        ]);

        $session = session('cart');
        if ($session != null) {
            $order=new Order;
            $order->first_name = $request->input('firstName');
            $order->last_name = $request->input('lastName');
            $order->phone = $request->input('phone');
            $order->address = $request->input('address');
            $order->user_id = Auth::id();
            $order->save();

            $cart = ShoppingCart::where('session', $session)->first();
            $cartItems = $cart->getCartItems();

            $subTotal = 0.0;
            $gst = 0.0;
            $grandTotal = 0.0;
            $GST = 0.15;

            foreach ($cartItems as $cartItem) {
                $subTotal += $cartItem->product->price * $cartItem->count;

                $orderDetail = new OrderDetail;
                $orderDetail->quantity = $cartItem->count;
                $orderDetail->product_id = $cartItem->product_id;
                $orderDetail->order_id = $order->id;
                $orderDetail->save();
            }

            $gst += $subTotal * $GST;
            $grandTotal += $subTotal + $gst;

            $order->sub_total = $subTotal;
            $order->gst = $gst;
            $order->grand_total = $grandTotal;
            $order->status = "waiting";
            $order->save();

            $cart->delete();

            return redirect('/order');
        }

        return response('session expire', 404);
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $order = Order::find($id);

        return view('order.edit', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect('/order');
    }

    public function destroy(Order $order)
    {
        //
    }
}

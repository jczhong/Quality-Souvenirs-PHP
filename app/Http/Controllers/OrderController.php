<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\ShoppingCart;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders = null;
        $isAdmin = false;
        if ($user->isAdmin()) {
            $orders = Order::all();
            $isAdmin = true;
        } else {
            $orders = Order::where('UserID', $user->id)->get();
        }
        return view('profile_orders', ['orders' => $orders, 'isAdmin' => $isAdmin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $address = null;
        $phoneNumber = null;

        if ($user != null) {
            $address = $user->Address;
            $phoneNumber = $user->PhoneNumber;
        }

        return view('order_create', ['address' => $address, 'phoneNumber' => $phoneNumber]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $session = session('cart');
        if ($session != null) {
            $order=new Order;
            $order->FirstName = $request->input('firstName');
            $order->LastName = $request->input('lastName');
            $order->PhoneNumber = $request->input('phone');
            $order->Address = $request->input('address');
            $order->UserID = Auth::id();
            $order->save();

            $cart = ShoppingCart::where('Session', $session)->first();
            $cartItems = $cart->getCartItems();

            $subTotal = 0.0;
            $gst = 0.0;
            $grandTotal = 0.0;
            $GST = 0.15;

            foreach ($cartItems as $cartItem) {
                $subTotal += $cartItem->souvenir->Price * $cartItem->Count;

                $orderDetail = new OrderDetail;
                $orderDetail->Quantity = $cartItem->Count;
                $orderDetail->SouvenirID = $cartItem->SouvenirID;
                $orderDetail->OrderID = $order->id;
                $orderDetail->save();
            }

            $gst += $subTotal * $GST;
            $grandTotal += $subTotal + $gst;

            $order->SubTotal = $subTotal;
            $order->GST = $gst;
            $order->GrandTotal = $grandTotal;
            $order->OrderStatus = "waiting";
            $order->Date = Carbon::now();
            $order->save();

            return redirect('/order');
        }

        return response('session expore', 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $id = $request->input('id');
        $order = Order::find($id);

        return view('profile_orders_edit', ['isAdmin' => $user->isAdmin, 'order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $order = Order::find($id);
        $order->OrderStatus = $request->input('status');
        $order->save();

        return redirect('/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

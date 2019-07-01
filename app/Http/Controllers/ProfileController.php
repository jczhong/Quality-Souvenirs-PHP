<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('profile.index', [
            'fullName' => $user->full_name,
            'email' => $user->email,
            'phoneNumber' => $user->phone,
            'address' => $user->address]);
    }

    public function store(Request $request) {
        $request->validate([
            'fullName' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ]);

        $user = Auth::user();
        $user->full_name = $request->input('fullName');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();

        return redirect('/profile');
    }
}

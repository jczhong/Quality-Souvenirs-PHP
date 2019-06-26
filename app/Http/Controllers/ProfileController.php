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
        info('====>', [$user]);

        return view('profile', [
            'isAdmin' => $user->isAdmin,
            'fullName' => $user->FullName,
            'email' => $user->email,
            'phoneNumber' => $user->PhoneNumber,
            'address' => $user->Address]);
    }

    public function store(Request $request) {
        $request->validate([
            'fullName' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $user = Auth::user();
        $user->FullName = $request->input('fullName');
        $user->PhoneNumber = $request->input('phone');
        $user->Address = $request->input('address');
        $user->save();

        return redirect('/profile');
    }
}

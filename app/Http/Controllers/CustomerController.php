<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->get();

        return view('customer.index', ['isAdmin' => $user->isAdmin, 'users' => $users]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(Request $request)
    {
        $currentUser = Auth::user();
        $id = $request->input('id');
        $user = User::where('id', $id)->first();

        return view('customer.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $user = User::find($id);
        $user->active = $request->input('status');
        $user->save();

        return redirect('/customer');
    }

    public function destroy(User $user)
    {
        //
    }
}

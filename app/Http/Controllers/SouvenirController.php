<?php

namespace App\Http\Controllers;

use App\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SouvenirController extends Controller
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
        $souvenirs = Souvenir::all();

        return view('profile_souvenirs', ['isAdmin' => $user->isAdmin, 'souvenirs' => $souvenirs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Souvenir  $souvenir
     * @return \Illuminate\Http\Response
     */
    public function show(Souvenir $souvenir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Souvenir  $souvenir
     * @return \Illuminate\Http\Response
     */
    public function edit(Souvenir $souvenir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Souvenir  $souvenir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Souvenir $souvenir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Souvenir  $souvenir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Souvenir $souvenir)
    {
        //
    }
}

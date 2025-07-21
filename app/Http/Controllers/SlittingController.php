<?php

namespace App\Http\Controllers;

use App\Models\Slitting;
use Illuminate\Http\Request;

class SlittingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                        return view('slitting.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Slitting $slitting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slitting $slitting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slitting $slitting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slitting $slitting)
    {
        //
    }
}

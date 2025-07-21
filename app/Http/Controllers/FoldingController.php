<?php

namespace App\Http\Controllers;

use App\Models\Folding;
use Illuminate\Http\Request;

class FoldingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('folding.index');

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
    public function show(Folding $folding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folding $folding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folding $folding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folding $folding)
    {
        //
    }
}

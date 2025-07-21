<?php

namespace App\Http\Controllers;

use App\Models\Printingprocess;
use Illuminate\Http\Request;

class PrintingprocessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('printingprocess.index');
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
    public function show(Printingprocess $printingprocess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Printingprocess $printingprocess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Printingprocess $printingprocess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Printingprocess $printingprocess)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Jobcard;
use Illuminate\Http\Request;

class JobcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jobcards.index');
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
    public function show(Jobcard $jobcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobcard $jobcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobcard $jobcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobcard $jobcard)
    {
        //
    }
}

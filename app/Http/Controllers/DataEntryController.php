<?php

namespace App\Http\Controllers;

use App\Models\DataEntry;
use Illuminate\Http\Request;

class DataEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages.entry');
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
    public function show(DataEntry $dataEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataEntry $dataEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataEntry $dataEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataEntry $dataEntry)
    {
        //
    }
}

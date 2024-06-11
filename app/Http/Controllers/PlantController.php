<?php

namespace App\Http\Controllers;

use App\Models\plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages.plant');
    }

    public function plant()
    {
        $data = Plant::get();
        return view('Pages.plant', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_plant' => $request->input("plant"),
        ];

        Plant::create($data);
        return redirect()->route('plant')->with('suuccess', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(plant $plant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plant $plant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, plant $plant, $id)
    {
        $data = [
            'nama_plant' => $request->input("plant"),

        ];

        Plant::where('id', $id)->update($data);
        return redirect()->route('plant')->with('suuccess', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plant $plant, $id)
    {
        Plant::where('id', $id)->delete();
        return redirect()->route('plant')->with('suuccess', 'berhasil delete data');
    }
}

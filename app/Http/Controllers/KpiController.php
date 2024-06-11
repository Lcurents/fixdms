<?php

namespace App\Http\Controllers;

use App\Models\Kpi;
use App\Models\User;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function kpi()
    {
        $data = Kpi::get();
        return view('Pages.kpi', compact('data'));
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
        $data = [
            'nama_kpi' => $request->input("kpi"),
            'department' => $request->input("department"),

        ];

        Kpi::create($data);
        return redirect()->route('kpi')->with('suuccess', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kpi $kpi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kpi $kpi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kpi $kpi, $id)
    {
        $data = [
            'nama_kpi' => $request->input("kpi"),
            'department' => $request->input("department"),

        ];

        Kpi::where('id', $id)->update($data);
        return redirect()->route('kpi')->with('suuccess', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kpi $kpi, $id)
    {
        Kpi::where('id', $id)->delete();
        return redirect()->route('kpi')->with('suuccess', 'berhasil delete data');
    }
}

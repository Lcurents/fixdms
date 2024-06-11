<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages.kategori');
    }

    public function kategori()
    {
        $data = Kategori::get();
        return view('Pages.kategori', compact('data'));
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
            'nama_kategori' => $request->input("kategori"),
            'department' => $request->input("department"),

        ];

        Kategori::create($data);
        return redirect()->route('kategori')->with('suuccess', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori, $id)
    {
        $data = [
            'nama_kategori' => $request->input("kategori"),
            'department' => $request->input("department"),

        ];

        Kategori::where('id', $id)->update($data);
        return redirect()->route('kategori')->with('suuccess', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        Kategori::where('id', $id)->delete();
        return redirect()->route('kategori')->with('suuccess', 'berhasil delete data');
    }
}

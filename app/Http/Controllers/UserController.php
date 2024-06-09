<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages.admin');
    }

    public function user()
    {
        $data = User::get();
        return view('Pages.admin',compact('data'));
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
                'name'=>$request->input("name"),
                'email'=>$request->input("email"),
                'role'=>$request->input("role"),
                'password'=>Hash::make($request->input("password"))
            ];
    
            User::create($data);
            return redirect()->route('user')->with('suuccess','berhasil menambahkan data');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    
        $data = [
            'name'=>$request->input("name"),
            'email'=>$request->input("email"),
            'role'=>$request->input("role"),
        ];
    
        User::where('id',$id)->update($data);
        return redirect()->route('user')->with('suuccess','berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('user')->with('suuccess','berhasil delete data');
    }
}

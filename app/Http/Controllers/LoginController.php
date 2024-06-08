<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'email wajib di isi',
            'password.required'=>'password wajib di isi'
        ]);

        $infologin = [  
        'email'=>$request->email,
        'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            //kalau auth sukses
            return redirect()->route('home');
        } else{
            //kalau auth gagal
            return redirect('sesi')->withErrors('username dan password yang anda masukan tidak sesuai');
        }

        
    }
public function logout(){
        Auth::logout();
        return redirect('sesi')->with('berhasil logout');

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
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

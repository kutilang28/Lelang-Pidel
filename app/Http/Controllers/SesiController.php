<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  // assuming you have a User model
use Illuminate\Support\Facades\Hash;  // for hashing the password

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getregister(){
        return view('signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'name'=>$request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // login the user (optional)
        // auth()->login($user);

        return redirect('login')->with('success', 'Penambahan Data Barang Berhasil!');  // redirect the user after successful registration
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'administrator') {
                return redirect('admin/admin');
            }elseif (Auth::user()->role == 'petugas') {
                return redirect('admin/petugas');
            }elseif (Auth::user()->role == 'masyarakat') {
                return redirect('admin/masyarakat');
            }
        }else {
            return redirect('')->withErrors('email dan password salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

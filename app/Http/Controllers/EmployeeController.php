<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pemilik.karyawan.index', [
            'employees' => User::where('role', 'karyawan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemilik.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'nama'      => 'required',
            'username'  => 'required|unique:users',
            'password'  => 'required|min:5',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['role'] = 'karyawan';
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return redirect('/pemilik/karyawan')->with('success', 'Data Karyawan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        dd($user);
        return view ('/pemilik.karyawan.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        dd($user);

        User::destroy($user->id);

        return redirect('/pemilik/karyawan')->with('success','Data Karyawan Berhasil Dihapus');
    }
}


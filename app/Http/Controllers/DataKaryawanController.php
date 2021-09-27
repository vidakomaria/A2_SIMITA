<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\Inflector\Rules\French\Rules;
use Illuminate\Http\Request;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->get();
        return view('pemilik.data_karyawan.index', [
            'employees' => $karyawan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemilik.data_karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $rules=[
            'nama'      => 'required',
            'username'  => 'required|unique:users',
            'password'  => 'required|min:5',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['role'] = 'karyawan';
        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);

        return redirect('/pemilik/data_karyawan')->with('success', 'Data Karyawan berhasil ditambah');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id->nama);
        return view('/pemilik.data_karyawan.edit', [
            'user' => User::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        $user = User::where('id', $request->id)->first();
        $rules=[
            'nama'      => 'required',
            'password'  => 'required|min:5',
        ];

        if($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        $validatedData['role'] = 'karyawan';
        $validatedData['password'] = $request->password;

        User::where('id', $user->id)->update($validatedData);

        return redirect('/pemilik/data_karyawan')->with('success', 'Data Karyawan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/pemilik/data_karyawan')->with('success','Data Barang Berhasil Dihapus');
    }
}

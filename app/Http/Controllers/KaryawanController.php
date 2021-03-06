<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Karyawan.index', [
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
        return view('Karyawan.tambah');
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
            'password'  => 'required',
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
        $user = User::where('id', $id)->first();

        return view('Karyawan.ubah', [
            'user' => $user,
        ]);
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
        $user = User::where('id', $id)->first();

        $rules = [
            'nama'        => 'required',
            'password'    => 'required|min:2',
        ];

        if ( $request->username != $user->username){
            $rules['username'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($request->password);

        User::where('id', $id)->update($validatedData);

        return redirect('/pemilik/karyawan')->with('success','Data Karyawan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
//        return $user;
        User::destroy($user->id);
        return redirect('/pemilik/karyawan')->with('success','Data Karyawan Berhasil Dihapus');
    }
}

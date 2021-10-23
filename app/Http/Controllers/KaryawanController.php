<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('pemilik.karyawan.index', [
            'employees' => User::where('role', 'karyawan')->get()
        ]);
    }

    public function create()
    {
        return view('pemilik.karyawan.create');
    }

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

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
//        return $user->nama;

        return view('/pemilik.karyawan.edit', [
            'user' => $user,
//            'user' => $user::where('id', $user->id)->first()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user = User::where('id', $request->id)->first();

        $rules = [
            'nama'     => 'required',
            'password'    => 'required|min:2',
        ];

        if ( $request->username != $user->username){
            $rules['username'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($request->password);

        User::where('id', $request->id)->update($validatedData);

        return redirect('/pemilik/karyawan')->with('success','Data Karyawan Berhasil Diubah');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
//        return $user;

        User::destroy($user->id);
        return redirect('/pemilik/karyawan')->with('success','Data Karyawan Berhasil Dihapus');
    }


}

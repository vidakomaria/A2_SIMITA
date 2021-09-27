<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
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
//        return $request;

        $rules = [
            'nama'     => 'required',
            'username'   => 'required',
            'password'    => 'required|min:2',
        ];

        $validatedData = $request->validate($rules);

//        $validatedData['user_id'] = auth()->user()->id;

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

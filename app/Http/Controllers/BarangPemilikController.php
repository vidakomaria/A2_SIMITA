<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangPemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::filter(request(['search']))->get();
//        $barang = Barang::all();

        return view('pemilik.items.index', [
            'barang' => $barang->sortBy(['stok', 'asc'])
//                'barang' => $barang,
        ]);
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
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('/pemilik.items.edit', [
            'item' => $barang,
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'nama_barang'   => 'required',
            'harga_beli'    => 'required',
            'id_kategori'   => 'required',
        ];

        $validatedData              = $request->validate($rules);
        $validatedData['id_barang'] = $barang->id_barang;
        $validatedData['stok']      = $barang->stok + $request->stok;

        Barang::where('id_barang', $barang->id_barang)
            ->update($validatedData);

        return redirect('/pemilik/barang')->with('success','Data Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}

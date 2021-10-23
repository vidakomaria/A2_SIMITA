<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangDijual;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BarangPemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = BarangDijual::filter(request(['search']))->get();
//        $barang = Barang::all();

        return view('pemilik.barang.index', [
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
        return view('/pemilik.barang.edit', [
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
            'harga_jual'    => 'required',
            'id_kategori'   => 'required',
        ];

        $validatedData              = $request->validate($rules);
        $validatedData['id_barang'] = $barang->id_barang;
//        $validatedData['stok']      = $barang->stok + $request->stok;
        $validatedData['stok']      = $request->stok;

        $rekap = [
            'tgl'           => Carbon::now(),
            'id_barang'     => $validatedData['id_barang'],
            'barang_masuk'  => $request->stok,
            'id_admin'      => auth()->user()->id,
        ];

        BarangDijual::where('id_barang', $barang->id_barang)
            ->update($validatedData);
        Barang::where('id_barang', $barang->id_barang)
            ->update($validatedData);
//        RekapBarang::create($rekap);

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

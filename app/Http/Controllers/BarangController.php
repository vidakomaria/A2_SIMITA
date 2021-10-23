<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\RekapBarang;
use App\Models\BarangDijual;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangController extends Controller
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

        return view('admin.barang.index', [
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
        return view('admin.barang.create', [
            'categories'=>Kategori::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'id_barang'     => 'required|unique:barang_dijual',
            'nama_barang'   => 'required',
            'harga_beli'    => 'required',
            'id_kategori'   => 'required',
            'stok'          => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['harga_jual'] = 0;

        $rekap = [
            'tgl'           => Carbon::now(),
            'id_barang'     => $validatedData['id_barang'],
            'barang_masuk'  => $request->stok,
            'id_admin'      => auth()->user()->id,
        ];

        //create barang baru jika belum pernah dijual
        $barang = Barang::where('id_barang', $validatedData['id_barang'])->first();

//        dd($barang);
        if ($barang==null){
            Barang::create($validatedData);
        }
        elseif ($barang->id_barang == $request->id_barang){
            $barang->update($validatedData);
        }

        BarangDijual::create($validatedData);
        RekapBarang::create($rekap);

        return redirect('/admin/barang')->with('success','Data Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangDijual  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(BarangDijual $barang)
    {
        return view('admin.barang.show', [
            'item' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangDijual  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangDijual $barang)
    {
        return view('/admin.barang.edit', [
            'barang' => $barang,
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangDijual  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangDijual $barang)
    {
        $rules = [
            'nama_barang'   => 'required',
            'harga_beli'    => 'required',
            'id_kategori'   => 'required',
        ];

        $validatedData              = $request->validate($rules);
        $validatedData['id_barang'] = $barang->id_barang;
        $validatedData['stok']      = $barang->stok + $request->stok;


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
        RekapBarang::create($rekap);


        return redirect('/admin/barang')->with('success','Data Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangDijual  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangDijual $barang)
    {
        $id = BarangDijual::where('id_barang', $barang->id_barang);
        $barang = Barang::where('id_barang', $barang->id_barang);
        $barang->update(['stok'=>0]);
        $id->delete();

        return redirect('/admin/barang')->with('success','Data Barang Berhasil Dihapus');

    }
}

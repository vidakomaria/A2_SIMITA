<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
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
        $barang = Barang::filter(request(['search']))->get();
//        $barang = Barang::all();

        return view('admin.items.index', [
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
        return view('admin.items.create', [
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
            'id_barang' => 'required|unique:barang',
            'nama_barang' => 'required',
            'harga_beli' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['harga_jual'] = 0;


//        dd($validatedData['id_barang']);

        Barang::create($validatedData);

        return redirect('/admin/barang')->with('success','Data Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('admin.items.show', [
            'item' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('/admin.items.edit', [
            'barang' => $barang,
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

        return redirect('/admin/barang')->with('success','Data Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $id = Barang::where('id_barang', $barang->id_barang);
        $id->delete();

        return redirect('/admin/barang')->with('success','Data Barang Berhasil Dihapus');

    }

//    public function items()
//    {
//        return view('pemilik.items.index', [
//            'items' => Barang::latest()->filter(request(['search']))->get()
//        ]);
//    }
//
//    public function showPemilik($id)
//    {
//        $item = Barang::where('id_barang', $id)->first();
////        return ($item->id_barang);
//        return view('pemilik.items.show', [
//            'item' => $item
//        ]);
//    }
//
//    public function editPemilik($id)
//    {
//        $item = Barang::where('id_barang', $id)->first();
////        return $item->nama_barang;
//
//        return view('/pemilik.items.edit', [
//            'item' => $item,
//            'categories' => Kategori::all()
//        ]);
//    }
//
//    public function updatePemilik(Request $request, Barang $item)
//    {
////        return $request;
//
//        $rules = [
//            'id_barang'     => 'required',
//            'nama_barang'   => 'required',
//            'harga_beli'    => 'required|min:2',
//            'harga_jual'    => 'required|min:2',
//            'stok'          => 'required',
//            'category_id'   => 'required',
//        ];
//
//        $validatedData = $request->validate($rules);
//
////        $validatedData['user_id'] = auth()->user()->id;
//
//        Barang::where('id_barang', $request->id_barang)
//            ->update($validatedData);
//
//        return redirect('/pemilik/items')->with('success','Data Barang Berhasil Diubah');
//    }
//
//    public function delete($id)
//    {
//        $item = Barang::where('id_barang', $id)->first();
////        return $item->nama_barang;
//
//        Barang::destroy($item->id);
//        return redirect('/pemilik/items')->with('success','Data Barang Berhasil Dihapus');
//    }
}

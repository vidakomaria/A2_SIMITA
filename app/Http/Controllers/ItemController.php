<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(request('search'));
//        if (auth()->user()->role = 'karyawan'){
//            return view('admin.items.index', [
//                'items' => Item::latest()->filter(request(['search']))->get()
//            ]);
//        }
        $items = Item::filter(request(['search']))->get();

        return view('admin.barang.index', [
            'items' => $items->sortBy(['stok', 'asc'])
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        if (auth()->user()->role = 'karyawan') {
//
//            return view('items.admin.create', [
//                'categories'=>Category::all(),
//                'items'=>Item::all()->sortBy(['idBarang', 'asc'])
//            ]);
//        }

        return view('admin.barang.create', [
            'categories'=>Category::all(),
//            'items'=>Item::all()->sortBy(['id_barang', 'asc'])
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
//        $item = Item::where('id_barang', $request->id_barang)->first();
//        dd($item->stok);

        $rules = [
            'id_barang' => 'required|unique:',
            'nama_barang' => 'required',
            'harga_beli' => 'required',
            'category_id' => 'required',
            'stok' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['harga_jual'] = 0;


//        $data=[
//            'nama_barang'   => $item->nama_barang,
//            'category_id'   => $item->category_id,
//            'stok'          => ($item->stok) + ($request->stok),
//            'harga_beli'    => $item->harga_beli,
//            'harga_jual'    => $item->harga_jual,
//        ];

//        Item::where('id_barang', $item->id_barang)
//            ->update($data);

        Item::create($validatedData);

        return redirect('/admin/items')->with('success','Data Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
//        if (auth()->user()->kategori_user = 'karyawan'){
//            return view('items.admin.show', [
//                'item' => $item
//            ]);
//        }
        return view('admin.barang.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
//        dd($item->nama_barang);
//        if (auth()->user()->kategori_user = 'karyawan'){
//
//            return view('/items.admin.edit', [
//                'items' => $item::all(),
//                'item' => $item,
//                'categories' => Category::all()
//            ]);
//        }

        return view('/admin.barang.edit', [
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'id_barang'     => 'required',
            'nama_barang'   => 'required',
            'harga_beli'    => 'required|min:2',
            'stok'          => 'required',
            'category_id'   => 'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['stok'] = $item->stok + $request->stok;
//        $data=[
//            'nama_barang'   => $item->nama_barang,
//            'category_id'   => $item->category_id,
//            'stok'          => ($item->stok) + ($request->stok),
//            'harga_beli'    => $item->harga_beli,
//            'harga_jual'    => $item->harga_jual,
//        ];

//        Item::where('id_barang', $item->id_barang)
//            ->update($data);

//        $validatedData['user_id'] = auth()->user()->id;

        Item::where('id_barang', $item->id_barang)
            ->update($validatedData);

        return redirect('/admin/items')->with('success','Data Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Item::destroy($item->id);

        return redirect('/admin/barang')->with('success','Data Barang Berhasil Dihapus');
    }

    public function items()
    {
//        if (auth()->user()->kategori_user = 'pemilik'){
//            return view('items.owner.index', [
//                'items' => Item::latest()->filter(request(['search']))->get()
//            ]);
//        }

        return view('pemilik.barang.index', [
            'items' => Item::latest()->filter(request(['search']))->get()
        ]);
    }

    public function checkCategory(Request $request)
    {
//        dd($request);
//        $id = $request->id_barang;
        $kategori = Category::where('category_id', $request->id_barang)->get();
        $pesan = 'berhasil';

        return response()->json(['category_id' => $pesan]);
    }

    public function showPemilik($id)
    {
        $item = Item::where('id_barang', $id)->first();
//        return ($item->id_barang);
        return view('pemilik.barang.show', [
            'item' => $item
        ]);
    }

    public function editPemilik($id)
    {
        $item = Item::where('id_barang', $id)->first();
//        return $item->nama_barang;

        return view('/pemilik.barang.edit', [
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    public function updatePemilik(Request $request, Item $item)
    {
//        return $request;

        $rules = [
            'id_barang'     => 'required',
            'nama_barang'   => 'required',
            'harga_beli'    => 'required|min:2',
            'harga_jual'    => 'required|min:2',
            'stok'          => 'required',
            'category_id'   => 'required',
        ];

        $validatedData = $request->validate($rules);

//        $validatedData['user_id'] = auth()->user()->id;

        Item::where('id_barang', $request->id_barang)
            ->update($validatedData);

        return redirect('/pemilik/items')->with('success','Data Barang Berhasil Diubah');
    }

    public function delete($id)
    {
        $item = Item::where('id_barang', $id)->first();
//        return $item->nama_barang;

        Item::destroy($item->id);
        return redirect('/pemilik/barang')->with('success','Data Barang Berhasil Dihapus');
    }



}

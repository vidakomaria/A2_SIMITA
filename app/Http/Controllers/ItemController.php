<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
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
        if (auth()->user()->kategori_user = 'karyawan'){
            return view('items.admin.index', [
                'items' => Item::latest()->filter(request(['search']))->get()
            ]);
        }

        if (auth()->user()->kategori_user = 'pemilik'){
            return view('items.owner.index', [
                'items' => Item::latest()->filter(request(['search']))->get()
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (auth()->user()->kategori_user = 'karyawan') {

            return view('items.admin.create', [
                'categories'=>Category::all(),
                'items'=>Item::all()->sortBy(['idBarang', 'asc'])
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'idBarang' => 'required',
            'hargaBeli' => 'required|min:2',
            'hargaJual' => 'required|min:2',
            'category_id' => 'required'

        ]);

        Item::create($validatedData);
        if (auth()->user()->kategori_user = 'karyawan'){
            return redirect('/admin/items')->with('success','Data Barang Berhasil Ditambahkan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        if (auth()->user()->kategori_user = 'karyawan'){
            return view('items.admin.show', [
                'item' => $item
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        if (auth()->user()->kategori_user = 'karyawan'){

            return view('/items.admin.edit', [
                'items' => $item::all(),
                'item' => $item,
                'categories' => Category::all()
            ]);
        }
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
            'idBarang' => 'required',
            'hargaBeli' => 'required|min:2',
            'hargaJual' => 'required|min:2',
            'category_id' => 'required'
        ];

        $validatedData = $request->validate($rules);

//        $validatedData['user_id'] = auth()->user()->id;

        Item::where('idBarang', $item->idBarang)
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
        return redirect('/admin/items')->with('success','Data Barang Berhasil Dihapus');
    }

}

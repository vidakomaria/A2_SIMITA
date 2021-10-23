@extends('pemilik.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Data Barang {{ $item->nama_barang }}</h1>



        <div class="row justify-content-start my-3 mx-1">
            <div class="col-2">ID Barang</div>
            <div class="col-7">
                <div class="form-control"> {{ $item->id_barang }}</div>
            </div>
        </div>

        <div class="row justify-content-start my-3 mx-1">
            <div class="col-2">Nama Barang</div>
            <div class="col-7">
                <div class="form-control"> {{ $item->nama_barang }}</div>
            </div>
        </div>

        <div class="row justify-content-start my-3 mx-1">
            <div class="col-2">Kategori</div>
            <div class="col-7">
                <div class="form-control"> {{ $item->category->nama_kategori }}</div>
            </div>
        </div>

        <div class="row justify-content-start my-3 mx-1">
            <div class="col-2">Harga Beli</div>
            <div class="col-7">
                <div class="form-control"> {{ $item->harga_beli }}</div>
            </div>
        </div>

        <div class="row justify-content-start my-3 mx-1">
            <div class="col-2">Harga Jual</div>
            <div class="col-7">
                <div class="form-control"> {{ $item->harga_jual }}</div>
            </div>
        </div>

        <div class="row justify-content-start my-3 mx-1">
            <div class="col-2">Jumlah Stok</div>
            <div class="col-7">
                <div class="form-control"> {{ $item->stok }}</div>
            </div>
        </div>

        <div class="row justify-content-start mt-5 mx-1">
            <div class="col-2"><a href="/pemilik/items" class="btn text-white" ><i class="bi bi-arrow-left-circle"></i>  Kembali</a></div>
        </div>

{{--        <div class="col">--}}
{{--            <a href="/admin/items" class="btn text-white" ><i class="bi bi-arrow-left-circle"></i>  Kembali</a>--}}
{{--        </div>--}}

    </div>



@endsection

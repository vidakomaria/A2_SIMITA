@extends('pemilik.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Data Barang</h1>

        @if(session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-3">
            <div class="col">
{{--                <a href="/owner/items/create" class="btn text-white" ><i class="bi bi-plus-lg"></i>  Tambah Data Baru</a>--}}
            </div>
            <div class="col">
                <form action="/pemilik/barang" >
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Pencarian" name="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary text-white" type="submit" ><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <table class="table table-striped table-sm table-bordered">
                <thead class="text-white text-center">
                <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($barang as $barang)
                    <tr>
                        <td>{{ $barang->id_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>Rp. {{ number_format($barang->harga_beli) }}</td>
                        <td>Rp. {{ number_format($barang->harga_jual) }}</td>
                        <td>{{ $barang->kategori->nama_kategori }}</td>
                        <td class="text-center">{{ $barang->stok }}</td>
                        <td class="text-center edit">
                            {{--<a href="/pemilik/barang/{{ $barang->id_barang }}" class="badge bg-info text-decoration-none"><i class="bi bi-eye"></i>Lihat</a>--}}
                            <a href="/pemilik/barang/{{ $barang->id_barang }}/edit" class="badge bg-warning text-decoration-none"><i class="bi bi-pencil-square"></i>Ubah</a>

{{--                            <form action="/pemilik/items/{{ $item->id_barang }}" method="post" class="d-inline">--}}
{{--                                @method('delete')--}}
{{--                                @csrf--}}
{{--                                <button class="badge bg-danger border-0" onclick="return confirm('Ingin menghapus Data Barang?')">--}}
{{--                                    <i class="bi bi-x-circle"></i>Hapus--}}
{{--                                </button>--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
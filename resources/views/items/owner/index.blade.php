@extends('layouts.owner.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Data Barang</h1>

        @if(session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-3">
{{--            <div class="col">--}}
{{--                <a href="/owner/items/create" class="btn text-white" ><i class="bi bi-plus-lg"></i>  Tambah Data Baru</a>--}}
{{--            </div>--}}
            <div class="col">
                <form action="/owner/items" >
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
                    {{--                <th scope="col">No</th>--}}
                    <th scope="col">ID Barang</th>
                    {{--                <th scope="col">Nama Barang</th>--}}
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Laba</th>
                    <th scope="col">Jenis Barang</th>
                    {{--                <th scope="col">Tanggal Expired</th>--}}
                    {{--                <th scope="col">Jumlah Stok</th>--}}
{{--                    <th scope="col">Aksi</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        {{--                    <td>{{ $loop->iteration }}</td>--}}
                        <td>{{ $item->idBarang }}</td>
                        {{--                    <td>{{ $item->namaBarang }}</td>--}}
                        <td>Rp. {{ $item->hargaBeli }}</td>
                        <td>Rp. {{ $item->hargaJual }}</td>
                        <td>Rp. {{ ($item->hargaJual)-($item->hargaBeli) }}</td>
                        <td>{{ $item->category->name }}</td>
                        {{--                    <td>Tanggal Expired</td>--}}
                        {{--                    <td>Stok</td>--}}
{{--                        <td class="text-center edit">--}}
{{--                            <a href="/admin/items/{{ $item->idBarang }}" class="badge bg-info text-decoration-none"><i class="bi bi-eye"></i>Lihat</a>--}}
{{--                            <a href="/admin/items/{{ $item->idBarang }}/edit" class="badge bg-warning text-decoration-none"><i class="bi bi-pencil-square"></i>Ubah</a>--}}

{{--                            <form action="/admin/items/{{ $item->idBarang }}" method="post" class="d-inline">--}}
{{--                                @method('delete')--}}
{{--                                @csrf--}}
{{--                                <button class="badge bg-danger border-0" onclick="return confirm('Ingin menghapus Data Barang?')">--}}
{{--                                    <i class="bi bi-x-circle"></i>Hapus--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

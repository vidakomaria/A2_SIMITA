@extends('layouts.main')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4><a href="/admin/barang" class="text-decoration-none">Data Barang</a> / Ubah Barang</h4>
    </div>

    <div class="container-fluid border container-content shadow-sm" >
        @if(auth()->user()->role == 'karyawan')
            @php
                $action = "/admin/barang/$barang->id_barang";
            @endphp
        @elseif(auth()->user()->role == 'pemilik')
            @php
                $action = "/pemilik/barang/$barang->id_barang";
            @endphp
        @endif

        <form method="post" action={{ $action }} class="m-3 mx-4">
        @method('put')
        @csrf
        <!--Id Barang-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="id_barang" class="form-label">ID Barang</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control  @error('id_barang') is-invalid @enderror" id="id_barang" name="id_barang" placeholder="{{ $barang->id_barang }}" disabled>

                    @error('id_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!--Nama Barang-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang"
                           name="nama_barang" required value="{{ old('nama_barang', ucwords($barang->nama_barang)) }}">

                    @error('nama_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!--Harga Beli-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                </div>
                <div class="col-5">
                    <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" required
                           value="{{ old('harga_beli', $barang->harga_beli) }}">

                    @error('harga_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!--Harga Jual-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                </div>
                <div class="col-5">
                    @if(auth()->user()->role == 'karyawan')
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" disabled value="{{ $barang->harga_jual }}">
                    @elseif(auth()->user()->role == 'pemilik')
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" value="{{ $barang->harga_jual }}">
                    @endif
                    @error('harga_jual')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!--Kategori-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="id_kategori" class="form-label">Kategori</label>
                </div>
                <div class="col-5">
                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori">
                        <option value="{{ $barang->id_kategori }}">{{ ucwords($barang->kategori->nama_kategori) }}</option>
                        @foreach($categories as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{ ucwords($kategori->nama_kategori) }}</option>
                        @endforeach
                    </select>

                    @error('id_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <!--Stok-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="stok" class="form-label">Stok</label>
                </div>
                <div class="col-5">
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="{{ $barang->stok }}" required value="{{ old('stok') }}">

                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-7 me-4 mt-4 text-end">
                    <button type="submit" class="btn-green">Simpan</button>
{{--                    <button type="submit" >Simpan</button>--}}
                </div>
            </div>
        </form>
    </div>


@endsection

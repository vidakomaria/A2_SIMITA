@extends('admin.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Data Barang</h1>

        <div class="col-lg-8">
            <form method="post" action="/admin/barang" class="mb-5">
                @csrf
                <div class="mb-2">
                    <label for="id_barang" class="form-label">ID Barang</label>
                    <input type="number" class="form-control @error('id_barang') is-invalid @enderror" id="id_barang" name="id_barang" value="{{ old('id_barang') }}">

                    @error('id_barang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">

                    @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}">

                    @error('harga_beli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-2">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" disabled value="{{ old('harga_jual') }}">

                    @error('harga_jual')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="id_kategori" class="form-label">Kategori</label>
{{--                    <input type="number" class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required value="{{ old('category_id') }}">--}}

                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori">
                        <option value="">Pilih Jenis Barang</option>
                        @foreach($categories as $kategori)
                            @if(old('id_kategori') == $kategori->id_kategori)
                                <option value="{{ $kategori->id_kategori }}" selected>{{ $kategori->nama_kategori }}</option>
                            @else
                                <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('id_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" required value="{{ old('stok') }}">

                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn text-white ">Simpan</button>

            </form>

        </div>
    </div>

@endsection

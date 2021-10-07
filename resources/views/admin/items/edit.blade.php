@extends('admin.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Mengubah Data Barang</h1>

        <div class="col-lg-8">

            <form method="post" action="/admin/barang/{{ $barang->id_barang }}" class="mb-5">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="id_barang" class="form-label">ID Barang</label>
                    <select class="form-select  @error('id_barang') is-invalid @enderror" id="id_barang" name="id_barang" disabled>
                        <option value="{{ $barang->id_barang }}" selected>{{ $barang->id_barang }}</option>
                    </select>

                    @error('id_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required value="{{ old('nama_barang', $barang->nama_barang) }}">

                    @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" required value="{{ old('harga_beli', $barang->harga_beli) }}">

                    @error('harga_beli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" disabled value="{{ $barang->harga_jual }}">

                    @error('harga_jual')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="{{ $barang->stok }}" required value="{{ old('stok') }}">

                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Jenis Barang</label>
                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori">
                        <option value="{{ $barang->id_kategori }}">{{ $barang->kategori->nama_kategori }}</option>
                        @foreach($categories as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>

                    @error('id_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn me-md-2 text-white" style="width: 100pt" >Simpan</button>
                </div>

            </form>

        </div>
    </div>


@endsection

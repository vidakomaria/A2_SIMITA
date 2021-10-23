@extends('admin.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Mengubah Data Barang</h1>

        <div class="col-lg-8">
            <form method="post" action="/pemilik/barang/{{ $item->id_barang }}" class="mb-5">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="id_barang" class="form-label">ID Barang</label>
                    <select class="form-select  @error('id_barang') is-invalid @enderror" id="id_barang" name="id_barang" disabled>
                        <option value="{{ $item->id_barang }}" selected>{{ $item->id_barang }}</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required value="{{ old('nama_barang', $item->nama_barang) }}">

                    @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" name="harga_beli" required value="{{ old('harga_beli', $item->harga_beli) }}">

                    @error('harga_beli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" required value="{{ old('harga_jual', $item->harga_jual) }}">

                    @error('harga_jual')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" required value="{{ old('stok') }}" placeholder="{{ $item->stok }}">

                    @error('stok')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Jenis Barang</label>
                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori">
                        <option value="">Pilih Jenis Barang</option>
                        @foreach($categories as $category)
                            @if(old('id_kategori', $category->id_kategori) == $item->id_kategori)
                                <option value="{{ $category->id_kategori }}" selected >{{ $category->nama_kategori }}</option>
                            @else
                                <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                            @endif
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

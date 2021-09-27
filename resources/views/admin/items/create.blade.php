@extends('admin.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Data Barang</h1>

        <div class="col-lg-8">
            <form method="post" action="/admin/items" class="mb-5">
                @csrf
                <div class="mb-2">
                    <label for="id_barang" class="form-label">ID Barang</label>
                    <input type="number" class="form-control @error('id_barang') is-invalid @enderror" id="id_barang" name="id_barang" value="{{ old('id_barang') }}">

{{--                    <select class="form-select  @error('id_barang') is-invalid @enderror" id="id_barang" name="id_barang">--}}
{{--                        <option value="">Pilih ID Barang</option>--}}
{{--                        @foreach($items as $item)--}}
{{--                            @if(old('id_barang') == $item->id_barang)--}}
{{--                                <option value="{{ $item->id_barang }}" selected>{{ $item->id_barang }}</option>--}}
{{--                            @else--}}
{{--                                <option value="{{ $item->id_barang }}">{{ $item->id_barang }}</option>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </select>--}}

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
                    <label for="category_id" class="form-label">Kategori</label>
{{--                    <input type="number" class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required value="{{ old('category_id') }}">--}}

                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">Pilih Jenis Barang</option>
                        @foreach($categories as $category)
                            @if(old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('category_id')
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


    <script>
        function autofill() {
            // const id = document.querySelector('#id_barang').value
            // const kategori = document.querySelector('#category_id');
            // alert(id)
            //
            // kategori.value=id

        }

        const id_barang = document.querySelector('#id_barang');
        const category_id = document.querySelector('#category_id');

        id_barang.addEventListener('change', function () {
            // fetch('/admin/items/checkCategory?id_barang=' +id_barang.value )
            //     .then(response => response.json())
            //     .then(data => category_id.value = data.category_id)

            category_id.value = id_barang.value

        });



    </script>


@endsection

@extends('layouts.admin.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Data Barang</h1>

        <div class="col-lg-8">
            <form method="post" action="/admin/items" class="mb-5">
                @csrf
                <div class="mb-3">
                    <label for="idBarang" class="form-label">ID Barang</label>
                    <select class="form-select  @error('idBarang') is-invalid @enderror" id="idBarang" name="idBarang">
                        <option value="">ID Barang</option>
                        @foreach($items as $item)
                            @if(old('idBarang') == $item->idBarang)           {{--kalok sama dengan ada 2, tidak cek tipe data, 3 jadi string--}}
                                <option value="{{ $item->idBarang }}" selected>{{ $item->idBarang . "  " .$item->namaBarang }}</option>
                            @else
                                <option value="{{ $item->idBarang }}">{{ $item->idBarang . "  " .$item->namaBarang }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('idBarang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hargaBeli" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control @error('hargaBeli') is-invalid @enderror" id="hargaBeli" name="hargaBeli" required value="{{ old('hargaBeli') }}">

                    @error('hargaBeli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="hargaJual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control @error('hargaJual') is-invalid @enderror" id="hargaJual" name="hargaJual" required value="{{ old('hargaJual') }}">

                    @error('hargaJual')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Jenis Barang</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">Pilih Jenis Barang</option>
                        @foreach($categories as $category)
                            @if(old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('category_id')
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

        // const idBarang = document.querySelector('#idBarang');
        // const category = document.querySelector('#category_id');
        // $id = category.value;
        // $cat = $id->category->name
        //
        //
        //
        // idBarang.addEventListener('change', function (){
        //     category.value = $id
        // })

        // idBarang.addEventListener('change', function () {
        //     fetch('/admin/items/checkCategory?idBarang=' + idBarang.value)
        //         .then(response => response.json())
        //         .then(data => category.value = data.category)
        // });
    </script>

@endsection
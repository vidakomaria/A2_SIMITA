@extends('admin.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Prediksi</h1>

        <form method="GET" action="/admin/prediksi/chekForecast">
            @csrf
            <div class="row my-2">
                <div class="col-2">
                    <label>Pilih Benih</label>
                </div>
                <div class="col-4">
                    <select class="form-select" name="id_barang">
                        <option value="">Pilih Barang</option>
                        @foreach($grup_barang as $brg)
                            <option value="{{ $brg[0]->id_barang }}">{{ $brg[0]->barang->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-2">
                    <label>Pilih Waktu</label>
                </div>
                <div class="col-4">
                    <select class="form-select" name="periode">
                        <option value="">Pilih Waktu</option>
                        @for($i=0; $i < count($waktu); $i++)
                            <option value="{{ $i+1 }}">{{ $waktu[$i]->format('F Y') }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-green-cetak">Prediksi</button>
                </div>
            </div>
        </form>

    </div>
@endsection

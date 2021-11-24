@extends('layouts.main')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4>Prediksi</h4>
    </div>
    <div class="container m-4 table-responsive col-lg-auto">
        @if(auth()->user()->role == 'karyawan')
            @php
                $action = "/admin/prediksi/chekForecast";
            @endphp
        @elseif(auth()->user()->role == 'pemilik')
            @php
                $action = "/pemilik/prediksi/chekForecast";
            @endphp
        @endif
        <form method="GET" action={{ $action }}>
            @csrf
            <div class="row my-2">
                <div class="col-2">
                    <label>Pilih Benih</label>
                </div>
                <div class="col-4">
                    <select class="form-select @error('id_barang') is-invalid @enderror" name="id_barang" >
                        <option value="">Pilih Barang</option>
                        @foreach($grup_barang as $brg)
                            <option value="{{ $brg[0]->id_barang }}">{{ $brg[0]->barang->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('id_barang')
                        <div class="invalid-feedback">
                            {{ "Pilih Barang" }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row my-2">
                <div class="col-2">
                    <label>Pilih Waktu</label>
                </div>
                <div class="col-4">
                    <select class="form-select @error('periode') is-invalid @enderror" name="periode">
                        <option value="">Pilih Waktu</option>
                        @for($i=0; $i < count($waktu); $i++)
                            <option value="{{ $i+1 }}">{{ $waktu[$i]->format('F Y') }}</option>
                        @endfor
                    </select>
                    @error('periode')
                    <div class="invalid-feedback">
                        {{ "Pilih Waktu" }}
                    </div>
                    @enderror
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-green">Prediksi</button>
                </div>
            </div>
        </form>

    </div>
@endsection

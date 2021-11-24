@extends('layouts.penjualan')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4>Penjualan</h4>
    </div>
{{--    <div class="container m-4 table-responsive col-lg-auto">--}}
{{--        <h1 class="mb-3 border-bottom pb-3">Data Penjualan</h1>--}}

        {{--mengambil di view livewire penjualan --}}
        <livewire:penjualan.penjualan-index>

        </livewire:penjualan.penjualan-index>

{{--    </div>--}}

@endsection

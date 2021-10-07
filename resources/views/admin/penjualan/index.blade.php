@extends('admin.layouts.penjualan')

@section('container')

    <div class="container m-4 table-responsive col-lg-auto">
        <h1 class="mb-3 border-bottom pb-3">Data Penjualan</h1>

        {{--mengambil di view livewire penjualan --}}
        <livewire:penjualan-index>

        </livewire:penjualan-index>

    </div>

@endsection

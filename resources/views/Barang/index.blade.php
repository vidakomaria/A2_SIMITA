@extends('layouts.main')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4>Data Barang</h4>
    </div>

    <!--livewire-->
    <livewire:barang-index>

    </livewire:barang-index>

@endsection

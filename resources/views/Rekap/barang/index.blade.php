@extends('layouts.main')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4>Rekap Barang</h4>
{{--        @if(auth()->user()->role == "pemilik")--}}
{{--            {{ "Karyawan nih" }}--}}
{{--        @elseif(auth()->user()->role == "karyawan")--}}
{{--            {{ "pemilik" }}--}}
{{--        @endif--}}
    </div>
    <livewire:rekap.rekap-barang-index>

    </livewire:rekap.rekap-barang-index>
@endsection


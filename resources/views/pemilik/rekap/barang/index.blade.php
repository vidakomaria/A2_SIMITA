@extends('pemilik.layouts.main')

@section('container')
    <livewire:pemilik.rekap.rekap-barang-index>
    </livewire:pemilik.rekap.rekap-barang-index>

    <script>
        document.getElementById('tglAwal').max = new Date().toISOString().split("T")[0];
        document.getElementById('tglAkhir').max = new Date().toISOString().split("T")[0];
    </script>
@endsection

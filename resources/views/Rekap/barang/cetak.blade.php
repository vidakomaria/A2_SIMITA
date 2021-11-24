@extends('layouts.nota')
@section('nota')
    <div class="container mt-1">
        <div class="text-center mb-4">
            <h3 style="font-weight: bold">Rekap Barang Masuk</h3>
        </div>
        <div>
            <table class="table table-borderless">
                <tr>
                    <td>Admin</td>
                    <td>: {{ $admin }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ date('d/m/Y H:i', strtotime(\Carbon\Carbon::now())) }}</td>
                </tr>
            </table>
        </div>
            <table class="table table-striped table-sm table-borderless align-middle table-green">
                <thead class="text-white text-center">
                <tr class="align-middle">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Data Masuk</th>
                    <th scope="col">Total Barang</th>
                    <th scope="col">Admin</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prints as $print)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ date('d/m/Y - H.i', strtotime($print->tgl)) }}</td>
                        <td>{{ $print->id_barang }}</td>
                        <td>{{ $print->barang->nama_barang }}</td>
                        <td class="text-center" style="width: 12%">{{ $print->barang_masuk }}</td>
                        <td class="text-center" style="width: 12%">{{ $print->barang->stok }}</td>
                        <td>{{ $print->admin->nama }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <script>
        window.print()
    </script>
@endsection

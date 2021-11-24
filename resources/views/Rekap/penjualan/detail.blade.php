@extends('layouts.main')

@section('container')
    <div id="modalListBrg" >
        <div class="">
            <div class="modal-detail-content p-3">
                <div class="modal-header">
                    <div class="row">Transaksi Nomor IDT00{{ $id_transaksi }}</div>
                </div>
                <div class="modal-body p-0">
                    <table class="table table-green table-striped table-sm table-borderless align-middle">
                        <thead class="text-white text-center">
                        <tr class="align-middle">
                            <th scope="col">ID Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($detail as $value)
                            <tr>
                                <td>{{ $value->id_barang }}</td>
                                <td>{{ $value->barang->nama_barang }}</td>
                                <td>{{ $value->barang->harga_jual }}</td>
                                <td class="text-center">{{ $value->quantity }}</td>
                                <td>{{ $value->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex flex-total justify-content-end p-2 px-3 bd-highlight">
                        Keuntungan : Rp. {{ number_format($keuntungan) }}</div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#print"
                    style="width: 100px">
                        <i class="bi bi-printer"></i>  Cetak
                    </button>
                    <a href="javascript: window.history.back();"><button class="btn btn-close-detail">Tutup</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cetak-->
    <div class="modal fade" id="print" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Apakah anda ingin mencetak?</h5>
                </div>
                <div class="modal-footer">
                    @if(auth()->user()->role == 'karyawan')
                        @php
                            $href = "/admin/penjualan/nota/$id_transaksi";
                        @endphp
                    @elseif(auth()->user()->role == 'pemilik')
                        @php
                            $href = "/pemilik/penjualan/nota/$id_transaksi";
                        @endphp
                    @endif
                    <a href={{ $href }} target="_blank"><button class="btn btn-orange" data-bs-dismiss="modal">IYA</button></a>
                    <button type="button" class="btn btn-green" data-bs-dismiss="modal">TIDAK</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Cetak-->

    <script>
        document.getElementById('modalListBrg').style.display='block';

    </script>
@endsection

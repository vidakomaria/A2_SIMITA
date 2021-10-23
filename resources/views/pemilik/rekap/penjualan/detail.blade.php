@extends('pemilik.layouts.main')

@section('container')
    <div id="modalListBrg" >
        <div class="">
            <div class="modal-detail-content p-3">
                <div class="modal-header">
                    <div class="row">Transaksi Nomor {{ $id_transaksi }}</div>
                </div>
                <div class="modal-body p-0">
                    <table class="table table-striped table-sm table-bordered align-middle">
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
                        Total : Rp. {{ number_format($detail->sum('total')) }}</div>
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
                    <a href="/pemilik/rekap/penjualan/print/{{ $id_transaksi }}" target="_blank"><button class="btn btn-orange">IYA</button></a>
                    <button type="button" class="btn btn-green-cetak" data-bs-dismiss="modal">TIDAK</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Cetak-->

    <script>
        document.getElementById('modalListBrg').style.display='block';

        // var tutup = document.getElementById('tutup')
        // tutup.addEventListener('click', function (){
        //     document.getElementById('modalListBrg').style.display='none';
        // })

    </script>
@endsection

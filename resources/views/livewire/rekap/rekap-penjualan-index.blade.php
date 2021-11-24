<div>
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4>Rekap Penjualan</h4>
    </div>
    <div class="container m-4 mx-0 mb-0 pb-0 table-responsive col-lg-auto">
        <h6>Rekap Penjualan berdasarkan tanggal</h6>

{{--        <form method="get" action="/admin/rekap/penjualan/rekap">--}}
{{--            @csrf--}}
            <div class="row mb-3 align-items-center">
                <div class="col-auto ">
                    <label for="tglAwal" class="col-form-label">Tanggal Awal :</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" wire:model="tglAwal" id="tglAwal" class="form-control" name="tglAwal">
                </div>

                <div class="col-auto">
                    <label for="tglAkhir" class="col-form-label">Tanggal Akhir :</label>
                </div>
                <div class="col-auto p-0">
                    <input type="date" wire:model="tglAkhir" id="tglAkhir" class="form-control" name="tglAkhir">
                </div>

                <div class="col align-self-end">
                    <button type="button" class="btn btn-orange me-md-2 text-white"
                            data-bs-toggle="modal" data-bs-target="#print">
                        <i class="bi bi-printer"></i> Cetak
                    </button>
                </div>
            </div>
{{--        </form>--}}

        <div class="mt-1">
            <table class="table table-green table-striped table-sm table-borderless align-middle">
                <thead class="text-white text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">List Barang</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Admin</th>
                </tr>
                </thead>
                <tbody>
                @if($rekap->count())
                    @foreach($rekap as $data)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d/m/Y - H.i', strtotime($data->tgl)) }}</td>
                            <td>
                                @if(auth()->user()->role == 'karyawan')
                                    @php
                                        $href = "/admin/rekap/penjualan/detail/$data->id_penjualan";
                                    @endphp
                                @elseif(auth()->user()->role == 'pemilik')
                                    @php
                                        $href = "/pemilik/rekap/penjualan/detail/$data->id_penjualan";
                                    @endphp
                                @endif
{{--                                {{ $href }}--}}
                                <a id="listBarang" href={{ $href }}>
                                    IDT00{{ $data->id_penjualan }}
                                </a>
                            </td>
                            <td class="text-start">{{ $data->detailPenjualan[0]->barang->nama_barang }} , . . .</td>
                            <td>{{ $data->detailPenjualan[0]->quantity }} , . . .</td>
                            <td style="width: 12%">{{ $data->grand_total }}</td>
                            <td>{{ $data->admin->nama }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="7">Data Rekap Tidak Ada</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-total justify-content-end p-2 px-3 bd-highlight">
            @if($rekap->count())
                Keuntungan : Rp. {{ number_format($keuntungan) }}
            @else
                Keuntungan : Rp. 00
            @endif
        </div>

        <div class="row">
            <div class="col">
                Menampilkan {{ $rekap->currentPage() }} s/d {{ $rekap->lastPage() }} data
            </div>
            <div class="col-auto align-self-end">
                {{ $rekap->links() }}
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
                                $href = "/admin/rekap/penjualan/cetak/$tglAwal/$tglAkhir";
                            @endphp
                        @elseif(auth()->user()->role == 'pemilik')
                            @php
                                $href = "/pemilik/rekap/penjualan/cetak/$tglAwal/$tglAkhir";
                            @endphp
                        @endif
                        <a href={{ $href }} target="_blank"><button class="btn btn-orange" data-bs-dismiss="modal">IYA</button></a>
                        <button type="button" class="btn btn-green" data-bs-dismiss="modal">TIDAK</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal Cetak-->
    </div>
</div>

<script>
    document.getElementById('tglAwal').max = new Date().toISOString().split("T")[0];
    document.getElementById('tglAkhir').max = new Date().toISOString().split("T")[0];
</script>

@push('scripts')
@endpush

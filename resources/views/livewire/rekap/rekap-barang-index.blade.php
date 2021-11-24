<div>
    <div class="container-fluid mt-3 pt-2 ms-1 ps-0">
        <div class="row mb-3 align-items-center">
            <div class="col-auto ">
                <label for="tglAwal" class="col-form-label">Tanggal Awal :</label>
            </div>
            <div class="col-auto p-0">
                <input type="date" wire:model="tglAwal" id="tglAwal" class="form-control">
            </div>

            <div class="col-auto">
                <label for="tglAkhir" class="col-form-label">Tanggal Akhir :</label>
            </div>
            <div class="col-auto p-0">
                <input type="date" wire:model="tglAkhir" id="tglAkhir" class="form-control">
            </div>

            <div class="col align-self-end">
                <button type="button" class="btn btn-orange me-md-2 text-white"
                        data-bs-toggle="modal" data-bs-target="#print">
                    <i class="bi bi-printer"></i> Cetak
                </button>
            </div>
        </div>

        <!--Table Hasil-->
        <div class="table-responsive mx-3">
            <table class="table table-striped table-green table-sm table-borderless align-middle">
                <thead class="text-white text-center">
                <tr>
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
                @if($rekap->count())
                    @foreach($rekap as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('d/m/Y - H.i', strtotime($value->tgl)) }}</td>
                            <td>{{ $value->id_barang }}</td>
                            <td>{{ $value->barang->nama_barang }}</td>
                            <td class="text-center" style="width: 12%">{{ $value->barang_masuk }}</td>
                            <td class="text-center" style="width: 12%">{{ $value->total_barang }}</td>
                            <td>{{ $value->admin->nama }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
        <!--End Table-->

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
                            <a href="/admin/rekap/barang/cetak/{{ $tglAwal }}/{{ $tglAkhir }}" target="_blank"><button class="btn btn-orange" data-bs-dismiss="modal">IYA</button></a>
                        @elseif(auth()->user()->role == 'pemilik')
                            <a href="/pemilik/rekap/barang/cetak/{{ $tglAwal }}/{{ $tglAkhir }}" target="_blank"><button class="btn btn-orange" data-bs-dismiss="modal">IYA</button></a>
                        @endif
                        <button type="button" class="btn btn-green" data-bs-dismiss="modal">TIDAK</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal Cetak-->
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('tglAwal').max = new Date().toISOString().split("T")[0];
    document.getElementById('tglAkhir').max = new Date().toISOString().split("T")[0];
</script>
@endpush

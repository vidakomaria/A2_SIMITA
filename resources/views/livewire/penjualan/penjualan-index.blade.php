<div>
    <div class="container-fluid mt-3 pt-2 ms-1 ps-0">
{{--        <button type="submit"class="delete-text"><i class="bi bi-x-lg"></i>  Delete</button>--}}
        @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
        @endif

        <form wire:submit.prevent="store">
            @csrf
            <div class="col-5">
                <label for="id_barang" class="form-label">ID Barang</label>
{{--
{{--                <select name="id_barang" wire:model="id_barang" class="form-select  @error('id_barang') is-invalid @enderror">--}}
{{--                    <option value=""></option>--}}
{{--                    <option><input></option>--}}
{{--                    @foreach($items as $item)--}}
{{--                        <option value="{{ $item->id_barang }}">{{ $item->id_barang . '  ' . $item->nama_barang }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}


                <input type="text" name="id_barang" list="barang"  wire:model="id_barang" class="form-control @error('id_barang') is-invalid @enderror">
                <datalist id="barang">
                @foreach($items as $item)
                        <option value="{{ $item->id_barang }}">{{ $item->nama_barang }}</option>
                    @endforeach
                </datalist>
                @error('id_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-5">
                    <label for="quantity" class="form-label" >Quantity</label>
                    <div class="input-group mb-3">
                        <input name="quantity" wire:model="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="btn-green"><button type="submit" class="btn text-white">Tambahkan</button></div>
        </form >
    </div>


    <div class="row mt-4 mx-2">
        <table class="table table-striped table-green table-sm table-borderless align-middle">
            <thead class="text-white text-center">
            <tr>
                <th scope="col">ID Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>

            <tbody class="text-center">
                @foreach ( $transactions as $transaksi )
                    <tr>
                        <td>{{ $transaksi->id_barang }}</td>
                        <td>{{ $transaksi->barang->nama_barang }}</td>
                        <td>{{ number_format($transaksi->barang->harga_jual) }}</td>
                        <td>{{ $transaksi->quantity }}</td>
                        <td>{{ number_format($transaksi->sub_total) }}</td>
                        <td>
                            <button type="submit" wire:click="deleteTransaction({{ $transaksi->id }})" class="delete-text"><i class="bi bi-x-lg"></i>  Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot style="border-style:hidden">
                <tr class="total_penjualan" >
                    <td colspan="3" ></td>
                    <td style="border-style:hidden">Total</td>
                    <td colspan="2">
                        Rp. {{ number_format($transactions->sum('sub_total')) }}
                    </td>
                </tr>
                <tr style="border-style:hidden">
                    <td colspan="3" ></td>
                    <td style="border-style:hidden">Bayar : </td>
                    <td colspan="2">
                        <div class="row align-center">
                            <div class="col-1 mt-1" style="margin-right: 4px">Rp.</div>
                            <div class="col m-0 p-0">
                                <input type="number" wire:model="bayar"
                                       class="form-control width-auto @error ('bayar') is-invalid @enderror" id="bayar"
                                       style="height: 34px; width:80%; margin-left: 3px">

                                @error('bayar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </td>
                </tr>
                <tr >
                    <td colspan="3"></td>
                    <td style="border-style:hidden">Kembali : </td>
                    <td colspan="2">
                        Rp. {{ number_format($bayar - ($transactions->sum('sub_total'))) }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="container mx-auto ">
        <div class="row mt-3">
            <div class="col">
                <a href="/admin" class="btn-green-a px-3 py-2 text-decoration-none text-white rounded-3">
                    <i class="bi bi-arrow-left"></i>  Kembali</a>
            </div>
            <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-orange text-white" data-bs-toggle="modal" data-bs-target="#saveModal">
                    <i class="bi bi-sd-card"></i> Simpan</button>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="saveModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Apakah anda ingin mencetak?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="nota" class="btn btn-orange">IYA</button>
                    <button type="button" wire:click="noNota" class="btn btn-green" data-bs-dismiss="modal">TIDAK</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

@endpush


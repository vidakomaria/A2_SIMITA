@extends('layouts.main')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4>Data Admin Karyawan</h4>
    </div>
    <div class="container-fluid border container-content shadow-sm">

        @if(session()->has('success'))
            <div class="alert alert-success col-lg-8 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-3 mb-3">
            <div class="col mx-0">
                <a href="/pemilik/karyawan/create" class="btn btn-green text-white text-decoration-none" >Tambah</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-green table-sm table-borderless align-middle">
                <thead class="text-white text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col" style="width: 25%">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $karyawan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $karyawan->nama }}</td>
                        <td>{{ $karyawan->username }}</td>
                        <td style="width: 25%">{{ $karyawan->password }}</td>
                        <td>
                            <a href="/pemilik/karyawan/{{ $karyawan->id }}/edit" class="badge edit text-decoration-none"><i class="bi bi-pencil-square"></i> Ubah</a>
                            <form action="/pemilik/karyawan/{{ $karyawan->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data?')">
                                    <i class="bi bi-x-circle"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

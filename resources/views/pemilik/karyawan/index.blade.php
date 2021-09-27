@extends('pemilik.layouts.main')

@section('container')
    <div class="container m-4 table-responsive col-lg-auto items">
        <h1 class="mb-3 border-bottom pb-3">Data Admin Karyawan</h1>

        @if(session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row g-3">
            <div class="col">
                <a href="/pemilik/karyawan/create" class="btn text-white" >Tambah</a>
            </div>
        </div>

        <div class="mt-4">
            <table class="table table-striped table-sm table-bordered">
                <thead class="text-white text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
{{--                        <td>{{ $employee->id }}</td>--}}
                        <td>{{ $employee->nama }}</td>
                        <td>{{ $employee->username }}</td>
                        <td>{{ $employee->password }}</td>
                        <td class="text-center edit">
                            <a href="/pemilik/data_karyawan/{{ $employee->id }}/edit" class="badge bg-warning text-decoration-none"><i class="bi bi-pencil-square"></i> Ubah</a>

                            <form action="/pemilik/data_karyawan/{{ $employee->id }}"  method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin menghapus data?')">
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

@extends('layouts.main')

@section('container')
    <div class="container-fluid rounded-3 mt-2 pt-2 shadow-sm header" style="height: 50px">
        <h4><a href="/pemilik/karyawan" class="text-decoration-none">Data Admin Karyawan</a> / Tambah</h4>
    </div>

    <div class="container-fluid border container-content shadow-sm" >
        @if(session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form method="post" action="/pemilik/karyawan" class="m-3 mx-4">
        @csrf
        <!--Nama-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="nama" class="form-label">Nama</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">

                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <!--Username-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="username" class="form-label">Username</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">

                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <!--Password-->
            <div class="row mb-3">
                <div class="col-2">
                    <label for="password" class="form-label">Password</label>
                </div>
                <div class="col-5">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-7 me-4 mt-4 text-end">
                    <button type="submit" class="btn-green">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

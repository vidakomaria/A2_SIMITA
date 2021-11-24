@extends('layouts.login')

@section('login')
{{--    <div class="row justify-content-center" >--}}
        <div class="form-container mx-auto border border-1 bg-opacity-75 shadow-lg">
            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1 class="my-3 fw-normal text-center" style="color: #02734A">
                <strong>LOGIN</strong></h1>
            <main class="form-signin">
                <form action="/login" method="post">
                    @csrf       {{--untuk mengirimkan token autentication --}}
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus  value="{{ old('username') }}">
                        <label for="username"><i class="bi bi-person"></i>  Username</label>
                        @error('username')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control  @error('username') is-invalid @enderror" id="password" placeholder="Password" >
                        <label for="floatingPassword"><i class="bi bi-lock"></i>  Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg button shadow" type="submit" >LOGIN</button>
                </form>
            </main>
        </div>
{{--    </div>--}}



@endsection

@extends('layouts.login')

@section('login')

    <div class="row justify-content-center" >
        <div class="col-4 py-5 form-container mx-auto border border-1" style="">

            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin" >
                <h1 class="mb-3 fw-normal text-center mb-5" style="color: #31B410">LOGIN</h1>
                <form action="/login" method="post">
                    @csrf       {{--untuk mengirimkan token autentication --}}
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control " id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                        <label for="username"><i class="bi bi-person"></i>  Username</label>
                        {{--                        @enderror--}}
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="floatingPassword"><i class="bi bi-lock"></i>  Password</label>
                    </div>
                    <button class="w-100 btn btn-lg button" type="submit" >LOGIN</button>
                </form>
            </main>
        </div>
    </div>



@endsection

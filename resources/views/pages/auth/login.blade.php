@extends('layouts.login')

@section('title','Login')

@section('content')

<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-10 col-md-9">
        <div class="card shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                {{-- <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6"> --}}
                        <div class="p-4">
                            <div class="text-center">
                                <h1 class="h4 text-black mt-3 mb-5">Login</h1>
                                @if (Session::has('custom-error'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! Session::get('custom-error') !!}
                                    </div>
                                @endif
                                {{-- @if (session('errors'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                @if (session('custom-error'))
                                    <div class="alert alert-danger">
                                            {{ session('custom-error') }}
                                    </div>
                                @endif --}}
                            </div>

                            <form method="POST" action="{{ route('validateLogin') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
    
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                    {{-- </div>
                </div> --}}
            </div>
        </div>

    </div>

</div>

@endsection
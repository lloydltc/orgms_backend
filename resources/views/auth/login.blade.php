@extends('layouts.plain')

@section('body')
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
                <div class="card-body">
                    <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                       <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="">
                    </a>
                    <p class="text-center">Organisation Management System</p>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="userPassword">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input primary" type="checkbox" name="remember" id="userRememberMe">
                                <label class="form-check-label text-dark" for="userRememberMe">
                                    Remember this Device
                                </label>
                            </div>
                            <a class="text-primary fw-bold" href="{{ route('forgot') }}">Forgot Password ?</a>
                        </div>

                        <a onclick="this.closest('form').submit();return false;" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Log In</a>

                       <div class="d-flex align-items-center justify-content-center">
                          <p class="fs-4 mb-0 fw-bold">New to OGM?</p>
                           <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an account</a>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
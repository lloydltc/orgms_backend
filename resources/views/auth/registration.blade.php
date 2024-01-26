@extends('layouts.plain')

@section('body')
<div class="row justify-content-center w-100">
    <div class="col-md-8 col-lg-6 col-xxl-4">
    <div class="card mb-0">
        <div class="card-body">
        <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="">
        </a>
        <p class="text-center mb-4">Create an Account</p>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            @endif
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="row">
            <div class="mb-3 col-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="textHelp">
                @error('first_name')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>
            <div class="mb-3 col-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="textHelp">
                @error('last_name')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>
           </div>

            <div class="row">
            <div class="mb-3 col-6">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
            </div>
                <div class="mb-3 col-6">
                    <label for="phone" class="form-label">Mobile Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" aria-describedby="emailHelp">
                    @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

            </div>
            
            <div class="row"> 
            <div class="mb-3 col-12">
                    <div class="d-flex justify-content-between">
                        <label for="password" class="form-label">Password</label>
                        <a href="javascript:;" id="togglePassword" onclick="togglePassword();" class="small">Show</a>
                    </div>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')<span class="text-danger small">{{ $message }}</span>@enderror
                 </div>
             </div>
       

            <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Create Account</button>
            <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">Already have an account?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>

@endsection
@section('scripts')
    <script>
        function togglePassword() {
            const typ = $('#password').attr('type');
            console.log(typ);
            $('#password').attr('type', (typ ==='password' ? 'text' : 'password') );
            $('#togglePassword').text((typ ==='password' ? 'Hide' : 'Show'))
        }
    </script>
@endsection
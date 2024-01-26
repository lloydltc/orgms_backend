 @extends('layouts.member')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">User Profile</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
{{--            <div class="col-3">--}}
{{--                <div class="text-center mb-n5">--}}
{{--                    <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <div class="row">

        <div class="col-lg-4">
        <div class="card shadow-none border">
            <div class="card-body">
                <h4 class="fw-semibold mb-3">{{$user->first_name. ' '.$user->last_name}}</h4>
                <p></p>
                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center gap-3 mb-4">
                        <i class="ti ti-mail text-dark fs-6"></i>
                        <h6 class="fs-4 fw-semibold mb-0">{{$user->email}}</h6>
                    </li>
                    <li class="d-flex align-items-center gap-3 mb-4">
                        <i class="ti ti-phone-call text-dark fs-6"></i>
                        <h6 class="fs-4 fw-semibold mb-0">{{$user->phone}}</h6>
                    </li>
                   
                </ul>
            </div>

        </div>

        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Change Password</h5>

                    <form action="{{ route('change-password') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-4 col-6">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label">Old Password</label>
                                    <a href="javascript:;" id="toggleOldPassword" onclick="toggleOldPassword();" class="small">Show</a>
                                </div>
                                <input type="password" name="old_password" class="form-control" id="old_password">
                                @error('old_password')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4 col-6">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label">New Password</label>
                                    <a href="javascript:;" id="togglePassword" onclick="togglePassword();" class="small">Show</a>
                                </div>
                                <input type="password" name="password" class="form-control" id="password">
                                @error('password')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-6">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <a href="javascript:;" id="toggleConnfirmPassword" onclick="toggleConnfirmPassword();" class="small">Show</a>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control" id="confirm_password">
                                @error('password_confirmation')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3 col-6">
                                <button type="submit" class="btn btn-primary  mt-4 rounded-2">Update</button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Update User Details</h5>

                    <form action="{{ route('update-user-details') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-4 col-6">

                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" id="first_name" aria-describedby="textHelp">
                                    @error('first_name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4 col-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}" id="last_name" aria-describedby="textHelp">
                                @error('last_name')<span class="text-danger small">{{ $message }}</span>@enderror
                            </div>
                           
                        </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" aria-describedby="emailHelp">
                                    @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="phone" class="form-label">Mobile Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{$user->phone}}" aria-describedby="emailHelp">
                                    @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>


                            </div>

                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function toggleOldPassword() {
            const typ = $('#old_password').attr('type');
            console.log(typ);
            $('#old_password').attr('type', (typ ==='password' ? 'text' : 'password') );
            $('#toggleOldPassword').text((typ ==='password' ? 'Hide' : 'Show'))
        }
    </script>

    <script>
        function toggleConnfirmPassword() {
            const typ = $('#confirm_password').attr('type');
            console.log(typ);
            $('#confirm_password').attr('type', (typ ==='password' ? 'text' : 'password') );
            $('#toggleConfirmPassword').text((typ ==='password' ? 'Hide' : 'Show'))
        }
    </script>
    <script>
        function togglePassword() {
            const typ = $('#password').attr('type');
            console.log(typ);
            $('#password').attr('type', (typ ==='password' ? 'text' : 'password') );
            $('#togglePassword').text((typ ==='password' ? 'Hide' : 'Show'))
        }
    </script>
@endsection

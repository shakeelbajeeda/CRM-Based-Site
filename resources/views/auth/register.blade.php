@extends('layouts.auth')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="account-form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" style="width:100%;">
                    @csrf
                    <input type="hidden" name=""> <span class="login100-form-title">
                        Angvo Register
                    </span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <input class="input100 @error('username') is-invalid @enderror" type="text" name="name"
                                    placeholder="Username" autocomplete="off" value="{{ old('username') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('username')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <input class="input100 @error('email') is-invalid @enderror" type="text" name="email"
                                    placeholder="Email" required autocomplete="off" value="{{ old('email') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <input class="input100 @error('address') is-invalid @enderror" type="text" name="address"
                                    placeholder="Address" required autocomplete="off" value="{{ old('address') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('address')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <input class="input100 @error('phone') is-invalid @enderror" type="text" name="phone"
                                    placeholder="Phone" required autocomplete="off" value="{{ old('phone') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <input class="input100 @error('password') is-invalid @enderror" type="password"
                                    name="password" placeholder="Password" required value="{{ old('password') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input">
                                <input class="input100 @error('password_confirm') is-invalid @enderror" type="password"
                                    name="password_confirmation" placeholder="Password Confirmation" required
                                    value="{{ old('password_confirmation') }}">
                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert" style="display: block!important;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="customFile">Select Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                id="customFile" />
                            @error('image')
                                <span class="invalid-feedback" role="alert" style="display: block !important">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <a href=""><button type="submit" name="register" class="login100-form-btn"
                                style="background-color: #ff5722;width: 265px;">
                                Register
                            </button></a>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Already Member?
                        </span>
                        <a class="txt2" href="{{ route('login') }}">
                            Login
                        </a>
                    </div>

                    <!--   <div class="text-center p-t-136">
                                                                                        <a class="txt2" href="#">
                                                                                 Create your Account
                                                                                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                                                                                </a>
                                                                                            </div> -->
                </form>
            </div>
        </div>
    </div>
@endsection

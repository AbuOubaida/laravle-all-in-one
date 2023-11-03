@extends('layouts.auth.main')
@section('content')
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="card border-0 rounded-lg mt-5 p-5 d-block ">
                <div class="text-center">
                    <x-default.application-logo class="w-20 h-20 fill-current text-gray-500" />
                </div>
                <div class="card-body">
                    <x-auth._session_response/>
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="text" placeholder="Enter Your Email or Phone" value="{{old('email')}}"/>
                            <label for="email">Email address/Phone Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="password" placeholder="Password" name="password" value="{{old('password')}}"/>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" name="remember" id="remember_me" type="checkbox" value="" />
                            <label class="form-check-label" for="remember_me">Remember Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small text-chl" href="{{route('password.request')}}" >Forgot Password?</a>
                            <button class="btn btn-primary btn-bg-chl" type="submit">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{route('register')}}" class="text-chl">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>

@stop

@extends('layouts.auth.main')
@section('content')
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-7">
            <div class="card border-0 rounded-lg mt-4 p-5">
                <div class="card-header text-center">
                    <div class="text-center">
                        <x-default.application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </div>
                </div>
                <div class="card-body">
                    <x-auth._session_response/>
                    <form action="{{ route('store.register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter Your Name" value="{{old('name')}}"/>
                                    <label for="name">Full Name <span style="color: red">*</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="phone" name="phone" type="number" placeholder="Enter Your Phone Number" value="{{old('phone')}}"/>
                                    <label for="phone">Phone Number <span style="color: red">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter Your Email" value="{{old('email')}}"/>
                                    <label for="email">Email address <span style="color: red">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="address_1" name="address_1" value="{!! old('address_1') !!}"/>
                                    <label for="address_1">Address 1</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="address_2" name="address_2" value="{!! old('address_2') !!}"/>
                                    <label for="address_2">Address 2</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="address_3" name="address_3" value="{!! old('address_3') !!}"/>
                                    <label for="address_3">Address 3</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Enter New Password"/>
                                    <label for="password">New Password <span style="color: red">*</span></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="conform" name="password_confirmation" type="password" placeholder="Enter Conform Password" />
                                    <label for="conform">Confirmed Password <span style="color: red">*</span></label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0 float-end">
                            <button class="btn btn-primary btn-bg-chl" type="submit">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{route('login')}}" class="text-chl">Already registered? Login!</a></div>
                </div>
            </div>
        </div>
    </div>

@stop

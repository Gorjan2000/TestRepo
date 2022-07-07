@extends('layouts.app')
@canany(['create_user', 'update_user'])
@section('CssSection')
    <link rel="stylesheet" type="text/css" href="{{asset('css/company.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css"')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
@endsection

@section('title') Company @endsection
@section('body')

        @if (isset($company))
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <div class="login100-form-title" style="background-image: url({{asset('images/company.jpg')}});">
                            <span class="login100-form-title-1">
                                Edit Company
                            </span>
                        </div>
                        <form class="login100-form validate-form" action="{{route('company.update', $company->id)}}" method="post" enctype="multipart/form-data">
                             @csrf
                            @method('PUT')
                            <div class="wrap-input100 validate-input m-b-26" data-validate="Company Name is required">
                                <label class="label-input100" for="company_name">Name</label>
                                <input class="input100" type="text" name="company_name" id="company_name"
                                       value="{{$company->company_name}}" required placeholder="Enter name">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Location is required">
                                <label class="label-input100" for="location">Location</label>
                                <input class="input100" type="text" name="location" id="location"
                                       value="{{$company->location}}" required placeholder="Enter location">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
                                <label class="label-input100" for="email">Email</label>
                                <input class="input100" type="email" name="email" id="email"
                                       value="{{$company->email}}" required placeholder="Enter email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Contact number is required">
                                <label class="label-input100" for="phone">Phone</label>
                                <input class="input100" type="number" name="phone" id="phone"
                                       value="{{$company->phone}}" required placeholder="Enter phone">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @else
            <div class="limiter">

                <div class="container-login100">
                    <div class="wrap-login100">

                        <div class="login100-form-title" style="background-image: url({{asset('images/company.jpg')}});">
                            <span class="login100-form-title-1">
                                Create New Company
                            </span>
                        </div>

                        <form id="addPostForm" class="login100-form validate-form" action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="wrap-input100 validate-input m-b-26" data-validate="Company Name is required">
                                <label class="label-input100" for="company_name">Name</label>
                                <input class="input100" type="text" name="company_name" id="company_name"
                                       value="{{@old('company_name')}}" required placeholder="Enter name">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Location is required">
                                <label class="label-input100" for="location">Location</label>
                                <input class="input100" type="text" name="location" id="location"
                                       value="{{@old('location')}}" required placeholder="Enter location">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
                                <label class="label-input100" for="email">Email</label>
                                <input class="input100" type="email" name="email" id="email"
                                       value="{{@old('email')}}" required placeholder="Enter email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Contact number is required">
                                <label class="label-input100" for="phone">Phone</label>
                                <input class="input100" type="number" name="phone" id="phone"
                                       value="{{@old('phone')}}" required placeholder="Enter phone number">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    @endif
@endsection

@section('JsSection')
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>

@endsection

@endcanany

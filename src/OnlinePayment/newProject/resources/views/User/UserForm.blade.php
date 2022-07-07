@extends('layouts.app')
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
@canany(['create_user', 'update_user'])


@section('title') User @endsection
@section('body')
    @if (session('error_msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif

        @if (isset($user_id))
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <div class="login100-form-title" style="background-image: url({{asset('images/bg-01.jpg')}});">
                            <span class="login100-form-title-1">
                                Edit User
                            </span>
                        </div>
                        <form class="login100-form validate-form" action="{{url('user/'.$user_id->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Name is required">
                                <label class="label-input100" for="name">Name</label>
                                <input class="input100" type="text" name="name" id="name"
                                       value="{{$user_id->name}}" required placeholder="Enter name">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
                                <label class="label-input100" for="email">Email</label>
                                <input class="input100" type="email" name="email" id="email"
                                       value="{{$user_id->email}}" required placeholder="Enter email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                                <label class="label-input100" for="password">Password</label>
                                <input class="input100" type="password" name="password" id="password"
                                       value="{{$user_id->password}}" required placeholder="Enter password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="form-check form-check-inline validate-input m-b-18" data-validate = "Role is required">
                                <label class="label-input100 form-check-label" for="roles[]">Roles</label>
                                @foreach ($roles as $role)
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}"
                                    @if(in_array($role->id, $selected_roles))
                                        {{"checked"}}
                                        @else
                                        {{""}}
                                        @endif> {{$role->name}} <br>
                                @endforeach
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
                        <div class="login100-form-title" style="background-image: url({{asset('images/bg-01.jpg')}});">
                            <span class="login100-form-title-1">
                                Create New User
                            </span>
                        </div>
                        <form class="login100-form validate-form" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Name is required">
                                <label class="label-input100" for="name">Name</label>
                                <input class="input100" type="text" name="name" id="name"
                                       value="{{@old('name')}}" required placeholder="Enter name">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
                                <label class="label-input100" for="email">Email</label>
                                <input class="input100" type="email" name="email" id="email"
                                       value="{{@old('email')}}" required placeholder="Enter email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                                <label class="label-input100" for="password">Password</label>
                                <input class="input100" type="password" name="password" id="password"
                                       value="{{@old('password')}}" required placeholder="Enter password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
                                <label class="label-input100" for="password-confirm">Confirm Password</label>
                                <input class="input100" type="password" name="password_confirmation" id="password-confirm"
                                       required placeholder="Enter password" autocomplete="new-password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="input100 validate-input m-b-18" data-validate = "Company is required">
                                <label class="label-input100" for="company">Company</label>
                                <select class="input100" name="company" id="company">
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->company_name}}</option>
                                    @endforeach
                                </select><br>
                                <span class="focus-input100"></span>
                            </div>

                            <div class=" form-check form-check-inline validate-input m-b-18" data-validate = "Role is required">
                                <label class="label-input100 form-check-label" for="role">Role</label>
                                @foreach ($roles as $role)
                                    <input class=" form-check-input" type="checkbox" name="roles[]" value="{{$role->name}}"> {{$role->name}} <br>
                                @endforeach
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

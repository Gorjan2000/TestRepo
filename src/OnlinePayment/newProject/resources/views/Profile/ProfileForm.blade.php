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
@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{asset('images/company.jpg')}});">
                            <span class="login100-form-title-1">
                                Personal Info
                            </span>
                </div>
                <form class="login100-form validate-form" action="{{route('updateProfile', \Illuminate\Support\Facades\Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
                        <label class="label-input100" for="name">Name</label>
                        <input class="input100" type="text" name="name" id="name"
                               value="{{$profile->name}}" required placeholder="Enter name">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Company is required">
                        <label class="label-input100" for="company">Company</label>
                        @foreach(\App\Models\Company::all() as $c)
                            @if($c->id == $profile->company_id)
                                <input class="input100" name="company" id="company" readonly value="{{$c->company_name}} (Not Changeable)"/>
                            @endif
                        @endforeach
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
                        <label class="label-input100" for="email">Email</label>
                        <input class="input100" type="email" name="email" id="email"
                               value="{{$profile->email}}" required placeholder="Enter email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Contact number is required">
                        <label class="label-input100" for="number">Phone</label>
                        <input class="input100" type="number" name="number" id="number"
                               value="{{$profile->phone_number}}" required placeholder="Enter phone">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="input100 validate-input m-b-18" data-validate = "Gender is required">
                        <label class="label-input100" for="gender">Gender</label>
                        <select class="input100" name="gender" id="gender">
                            @if(isset($profile->gender))
                                <option value="{{$profile->gender->id??""}}">{{$profile->gender->name??""}}</option>
                                @foreach($gender as $g)
                                    @if($g->id!==$profile->gender->id)
                                        <option value="{{$g->id}}">{{$g->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select><br>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="input100 validate-input m-b-18" data-validate = "Status is required">
                        <label class="label-input100" for="status">Status</label>
                        <select class="input100" name="status" id="status">
                            @if(isset($profile->status))
                                <option value="{{$profile->status->id??""}}">{{$profile->status->name??""}}</option>
                                @foreach($status as $s)
                                    @if($s->id!==$profile->status->id)
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select><br>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('JsSection')
    <script src="{{ asset('js/UserRetrieve.js') }}"></script>

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

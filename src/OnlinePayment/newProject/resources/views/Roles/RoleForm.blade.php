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
@can('manage_role')
@section('title') User @endsection
@section('body')
    <div class="container">
    @if (session('error_msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    @if(isset($selectedperm))
        <div class="right_col" role="main">
            <h1 class="mt-3">Edit Role  <a href="{{route('role.index')}}" class="btn btn-primary btn-sm"> <i aria-hidden="true"></i> View Roles</a></h1>
            <div class="card mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('role.update', $role->id)}}" method="POST" class="bg-light p-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Role Name: </label>
                                <input type="text" name="name" class="form-control" value="{{$role->name}}" placeholder="Enter Role Name">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="permission">Permissions </label><br>
                                @foreach ($permissions as $permission)
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}"
                                    @if(in_array($permission->id, $selectedperm))
                                        {{"checked"}}
                                        @else
                                        {{""}}
                                        @endif> {{$permission->name}} <br>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="right_col" role="main">
            <h1 class="mt-3">Create Role  <a href="{{route('role.index')}}" class="btn btn-primary btn-sm"> <i aria-hidden="true"></i> View Roles</a></h1>
            <div class="card mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('role.store')}}" method="POST" class="bg-light p-3">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Role Name: </label>
                                <input type="text" name="name" class="form-control" value="{{@old('name')}}" placeholder="Enter Role Name">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="permission">Permissions </label><br>

                                @foreach ($permissions as $permission)
                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}"> {{$permission->name}} <br>
                                @endforeach
                            </div>


                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
@endsection
@endcan


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

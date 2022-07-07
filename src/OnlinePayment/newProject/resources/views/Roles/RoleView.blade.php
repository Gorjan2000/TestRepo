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
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if (session('error_msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
        <button class="btn btn-primary text-white"><a class="text-white" style="text-decoration: none" href="{{route('role.create')}}">Add New Role</a></button>
<br/>
        <hr/>

    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-center">SN</th>
            <th class="text-center">Roles</th>
            <th class="text-center">Permissions</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php $index = 1;?>
        @foreach($result as $role)
            <tr>
                <td class="text-center">{{$index}}</td>
                <td class="text-center">{{$role->name}}</td>
                <td class="text-center">@foreach($role->permissions as $rp)
                        @if ($rp['pivot']['role_id']===$role->id)
                            {{$rp['name']}}
                            <br>
                        @endif
                    @endforeach</td>
                <td class="text-center">
                    <a class="fa fa-edit" href="{{route('role.edit', $role->id)}}"></a>
                </td>
                <td class="text-center">
                    <form action="{{url('role/'.$role->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fa fa-trash"></button>
                    </form>
                </td>
            </tr>

            <?php $index++;?>
        @endforeach
        </tbody>
    </table>
        <hr/>
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

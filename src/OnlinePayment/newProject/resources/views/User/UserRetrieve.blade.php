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
@if (session('status'))
    <div class="alert alert-success">{{session('status')}}</div>
@endif
@can('access_user')

@section('title') User @endsection
@section('body')
    <div class="container">
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if (session('error_msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
        <button class="btn btn-primary text-white">

        <a class="text-white" style="text-decoration: none" href="{{route('user.create')}}">Add New User</a>
        </button>
<br/>
        <hr/>
    <form class="d-flex" action="{{route('Users')}}" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <input type="hidden" id="order" name="order">
    <input type="hidden" id="id" name="id">
    <table class="table table-hover">
        <thead>
        <tr>
            @if (!request()->has('sort') and !request()->has('order'))
                <th scope="col" class="column_sort" id="sn">
                    <a href="{{request()->fullUrlWithQuery(['sort'=>'desc', 'order'=>'id'])}}">SN</a></th>
                <th scope="col" class="column_sort" id="name"><a
                        href="{{request()->fullUrlWithQuery(['sort'=>'desc', 'order'=>'name'])}}">
                        Name</a></th>
                <th scope="col" class="column_sort" id="email">
                    <a href="{{request()->fullUrlWithQuery(['sort'=>'desc', 'order'=>'email'])}}">Email</a></th>
            @elseif (request()->has('sort') and request()->has('order'))
                @php
                    if (request()->get('sort')=='desc'){
        $sort='asc';
    }
    else{
        $sort='desc';
    }
                @endphp
                <th scope="col" class="column_sort" id="sn">
                    <a href="{{request()->fullUrlWithQuery(['sort'=>$sort, 'order'=>'id'])}}">SN</a></th>
                <th scope="col" class="column_sort" id="name"><a
                        href="{{request()->fullUrlWithQuery(['sort'=>$sort, 'order'=>'name'])}}">
                        Name</a></th>
                <th scope="col" class="column_sort" id="email">
                    <a href="{{request()->fullUrlWithQuery(['sort'=>$sort, 'order'=>'email'])}}">Email</a></th>

            @endif
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody id="CompanyTable">

        @if (isset($result))
            <?php $index = 1?>
            {{--        @dd($search->name);--}}
            @foreach($result as $user)

                <tr>
                    <td>{{$index}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a class="fa fa-edit" href="{{route('user.edit', $user->id)}}"></a></td>
                    <td>
                        <form action="{{url('user/'.$user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fa fa-trash"></button>
                        </form>
                    </td>
                </tr>

                <?php $index++;?>
            @endforeach<br>
        </tbody>
    </table>
        <hr/>

        <nav aria-label="..." >
            <ul class="pagination justify-content-center">
                @for ($i=1; $i<=$total; $i++)
                    <li class="page-item"><a class="page-link" id="{{$i}}" onclick="make_active({{$i}})" href="{{request()->fullUrlWithQuery(['page'=>$i])}}">{{$i}}</a></li>
                @endfor

            </ul>
        </nav>

    @else
        <?php $index = 1;?>
        {{ $users -> links()}}
        @foreach($users as $user)

            <tr>
                <td>{{$index}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a class="fa fa-edit" href="{{route('user.edit', $user->id)}}"></a></td>
                <td>
                    <form action="{{url('user/'.$user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fa fa-trash"></button>
                    </form>
                </td>
            </tr>
            <?php $index++;?>
        @endforeach<br>
        </tbody>
    @endif
    </div>

@endsection
@endcan


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

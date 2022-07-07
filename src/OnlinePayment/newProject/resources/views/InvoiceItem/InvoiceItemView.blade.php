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

@section('body')

    <div class="container bg-white p-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <button class="btn btn-primary text-white"><a class="text-white" style="text-decoration: none" href="{{route('invoice.create')}}">Add New Invoice</a></button>
    <br/>
    <hr/>

    <div id="invoice_details">
        <table class="table table-hover" id="myTable">
            <thead>
            <tr>
                <th scope="col" class="page_sort" id="id">S No.</th>
                <th scope="col" class="page_sort" id="invoice">Invoice</th>
                <th scope="col">View</th>
                @canany(['update_invoice', 'delete_invoice'])
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                @endcanany
            </tr>
            </thead>
            <tbody id="invoice_details_table">
            <?php $index=1;?>
            @foreach($invoice as $v)

                <tr>
                    <td >{{$index}}</td>
                    <td >Invoice {{$v->id}}/2022</td>
                    <td><a class="fa fa-eye" href="{{route('invoice.show', $v->id)}}"></a></td>
                    @canany(['update_invoice', 'delete_invoice'])
                        <td><a class="fa fa-edit" href="{{route('invoice.edit', $v->id)}}"></a></td>
                        <td>
                            <form action="{{route('invoice.destroy', $v->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="fa fa-trash"></button>
                            </form>
                        </td>
                    @endcanany
                </tr>
                <?php $index++;?>
            @endforeach
            </tbody>
        </table>
        <br/>
        <hr/>

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

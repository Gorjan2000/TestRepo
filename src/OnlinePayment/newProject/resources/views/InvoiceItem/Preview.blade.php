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

    <link href="{{ asset('css/preview.css') }}" rel="stylesheet">

@endsection
@section('body')
    <div id="invoice">
        <div class="invoice overflow-auto">
            <div id="preview_table">
                <header>
                    <div class="row">

                        <div class="col company-details">
                            <h2 id="name" class="display-4">{{$invoice->company->company_name}}</h2>
                            <div id="address">{{$invoice->company->location}}</div>
                            <div id="contact">{{$invoice->company->phone}}</div>
                            <div id="email">{{$invoice->company->email}}</div>
                        </div>
                    </div>
                </header>
                <main>

                    <div class="row contacts">
                        <div class="col invoice-details">
                            <h1 id="invoice-id"></h1>
                            <div id="date">Date of Invoice: {{$invoice->updated_at->format('d-m-Y')}}</div>
                            <div id="duedate">Due Date: {{$invoice->updated_at->add(new DateInterval('P15D'))->format('d-m-Y')}}</div>
                        </div>

                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th class="text-left">SN</th>
                            <th class="text-center">Items</th>
                            <th class="text-center">Unit cost</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody id="preview">

                        <?php $index=1;?>
                        @foreach ($arr as $k=>$v)
                            @foreach ($v as $key=>$value)
                                <tr>
                                    <td class="text-left">{{$index}}</td>
                                    <td class="text-center">{{$value['name']}}</td>
                                    <td class="text-center">{{$value['cost']}}</td>
                                    <td class="text-center">{{$value['quantity']}}</td>
                                    <td class="text-right">{{$value['total']}}</td>
                                </tr>
                            @endforeach
                            <?php $index++;?>
                        @endforeach
                        </tbody>


                        <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td id="total">{{$invoice->total_cost}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">DISCOUNT</td>
                            <td colspan="2" id="discount">{{$invoice->discount}}%</td>
                            <td id="discounted_price">{{$discounted_cost}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">TAX</td>
                            <td colspan="2" id="tax">{{$invoice->tax}}</td>
                            <td id="tax_price">{{$invoice->final_cost}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TOTAL</td>
                            <td id="grand_total"></td>
                        </tr>
                        </tfoot>
                    </table>
                    <div class="thanks">Thank you!</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                    </div>
                </main>
                <footer>
                    Invoice was created on a computer and is valid without the signature and seal.
                </footer>
            </div>
            <div></div>
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

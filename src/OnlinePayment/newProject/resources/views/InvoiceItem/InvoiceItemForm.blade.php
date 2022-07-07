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
    <div class="contain">
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        @if(isset($invoice))
                <div class="container">
                    <div class="bg-white m-3 p-3">
            <form method="post" action="{{route('invoice.update', $invoice->id)}}">
                @csrf
                @method('PUT')
                <div id="invoice">
                    <form id="AddForm" name="addForm" method="post">
                        @csrf
                        <div id="item-container">
                            @foreach ($arr as $k=>$v)
                                @foreach ($v as $key=>$value)
                                    <div class="row">
                                        <div class="col-3">
                                            <input required type="text" id="iName" class="iName" name="iName[]" onkeyup="abcd(Increment)"  placeholder="Item Name" value="{{$value['name']}}">
                                        </div>
                                        <div class="col-3">
                                            <input required type="number" id="cost" class="cost" name="cost[]" placeholder="Price" value="{{$value['cost']}}">
                                        </div>
                                        <div class="col-3">
                                            <input required type="number" id="quantity" name="qty[]" onkeyup="itemValue(Increment)" placeholder="Quantity" value="{{$value['quantity']}}">
                                        </div>
                                        <div class="col-3">
                                            <button type="button" id="bt" class="btn btn-danger" onclick="return this.parentNode.parentNode.remove(); ">Delete</button>
                                        </div>
                                    </div>

                                @endforeach
                            @endforeach
                        </div>
                        <ul id="myUL"></ul>
                        <a class="text-white btn btn-primary" style="text-decoration: none" id="add-new-item">Add New Item</a>
                        <br/>
                        <hr/>
                    </form><br>

                    <span id="SpanForm" class="error">@error('addForm'){{$message}}@enderror</span> <br>
                    <div id="items"></div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                    <label for="cost_wod">Cost without discount</label><br>
                    <input required type="text" id="cost_wod" name="cost_wod" class="cost_wod form-control" value="{{$invoice->total_cost}}" autocomplete="off"><br>
                    <span id="SpanCost" class="error">@error('cost_wod'){{$message}}@enderror</span> <br>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="discount">Discount in %</label><br>
                                <input required type="text" id="discount" name="discount" class="discountcost form-control" size="50" value=0 ><br>
                                <span id="SpanDiscount" class="error">@error('discount'){{$message}}@enderror</span> <br>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tax">Tax %</label><br>
                                <input required type="text" id="tax" name="tax" class="tax form-control" size="50" value=18><br>
                                <span id="SpanTax" class="error">@error('tax'){{$message}}@enderror</span> <br>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                    <label for="dcost">Price with discount and tax</label><br>
                    <input required type="text" id="dcost" name="dcost" class="dcost form-control" value="{{$invoice->final_cost}}" autocomplete="off"><br>
                    <span id="SpanDcost" class="error">@error('dcost'){{$message}}@enderror</span> <br>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                    <label for="advance">Advance payment</label><br>
                    <input required type="text" id="advance" name="advance" class="advance form-control"
                           onkeyup="AdvanceValue()" value="{{$invoice->advance}}" autocomplete="off"><br>
                    <span id="SpanAdvance" class="error">@error('advance'){{$message}}@enderror</span> <br>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                    <label for="due">Due amount</label><br>
                    <input required type="text" id="due" name="due" class="due form-control" value="{{$invoice->due}}" autocomplete="off"><br>
                    <span id="SpanDue" class="error">@error('due'){{$message}}@enderror</span> <br>
                                </div>
                            </div>
                        </div>


                    <button type="submit" class="btn btn-success" id="submit">Update</button>
                </div>

            </form>
                    </div>
                </div>
    </div>
    @else
        <div class="container">
            <div class="bg-white m-3 p-3">
        <form method="post" action="{{route('invoice.store')}}">
            @csrf
            <div id="invoice">
                <form id="AddForm" name="addForm" method="post">
                    @csrf
                    <div id="item-container">
                    </div>
                    <ul id="myUL"></ul>
                    <a class="text-white btn btn-primary" style="text-decoration: none" id="add-new-item">Add New Item</a>
                    <br/>
                    <hr/>

                </form><br>
                <span id="SpanForm" class="error">@error('addForm'){{$message}}@enderror</span> <br>
                <div id="items"></div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cost_wod">Cost without discount</label>
                            <input required type="text" id="cost_wod" name="cost_wod" class="cost_wod form-control" value="{{@old('cost_wod')}}" readonly>
                            <span id="SpanCost" class="error">@error('cost_wod'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="discount">Discount in %</label>
                        <input required type="number" id="discount" name="discount" class="discountcost form-control" size="50" value=0
                               onkeyup="itemValue()">
                            <span id="SpanDiscount" class="error">@error('discount'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                        <label for="tax">Tax %</label>
                        <input required type="number" id="tax" name="tax" class="tax form-control" size="50" value=18
                               onkeyup="itemValue()">
                        <span id="SpanTax" class="error">@error('tax'){{$message}}@enderror</span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="dcost">Cost with discount and tax</label>
                            <input type="text" id="dcost" name="dcost" class="dcost form-control" readonly value="{{@old('dcost')}}">
                            <span id="SpanDcost" class="error">@error('dcost'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="advance">Advance payment</label>
                            <input required type="text" id="advance" name="advance" class="advance form-control"
                                   onkeyup="AdvanceValue()" value="0"><br>
                            <span id="SpanAdvance" class="error">@error('advance'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="due">Due amount</label>
                            <input required type="text" id="due" name="due" class="due form-control" value="{{@old('due')}}">
                            <span id="SpanDue" class="error">@error('due'){{$message}}@enderror</span>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-success" id="submit">Submit</button>
            </div>

        </form>
        </div>
        </div>

    @endif

@endsection


@section('JsSection')
    <script src="{{ asset('js/InvoiceForm.js') }}"></script>
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


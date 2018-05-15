@extends('layouts.master')

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Stock</li>
@endsection

@section('content')
    <body class="hold-transition register-page">
    <style>
        .register-box
        {
            margin:0% auto;
        }
    </style>
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>AGROVET</b></a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Add a new Stock</p>
            <!--
            | Error / Success Messages will be reported here.
            -->
            @include('messages.errors')

            <form action="/stock/store" method="post">
                {{csrf_field()}}
                <!------------------
                | Stock field
                ------------------->
                <!------------------
                | Product Name field
                ------------------->
                @component('components.select',[
                    'errors' => $errors,
                    'name' => 'product_name',
                    'placeholder' => '-- Select the Product Name --',
                    'icon' => 'shopping-basket',
                    'display' => null
                ])
                    @slot('display_block')
                        @foreach($products as $product)
                            <option value="{{$product->id}}">
                                {{$product->product_name}} {{$product->manufacturer_name}} {{$product->concentration}}
                            </option>
                        @endforeach
                    @endslot
                @endcomponent

                @component('components.input',[
                    'errors' => $errors,
                    'name' => 'quantity',
                    'placeholder' => 'Enter quantity',
                    'icon' => 'at',
                    'type' => 'text',
                ])
                @endcomponent

                @component('components.input',[
                    'errors' => $errors,
                    'name' => 'manufactured_date',
                    'placeholder' => 'Enter Date Manufactured (yyyy-mm-dd)',
                    'icon' => 'gears',
                    'type' => 'text',
                ])
                @endcomponent

                @component('components.input',[
                    'errors' => $errors,
                    'name' => 'expiry_date',
                    'placeholder' => 'Enter Expiry Date (yyyy-mm-dd)',
                    'icon' => 'calendar-o',
                    'type' => 'text',
                ])
                @endcomponent

                @component('components.input',[
                    'errors' => $errors,
                    'name' => 'date_stocked',
                    'placeholder' => 'Enter Date Stocked (yyyy-mm-dd)',
                    'icon' => 'calendar',
                    'type' => 'text',
                ])
                @endcomponent

                @component('components.input',[
                    'errors' => $errors,
                    'name' => 'bought_price',
                    'placeholder' => 'Enter Bought Price',
                    'icon' => 'dollar',
                    'type' => 'number',
                ])
                @endcomponent

                @component('components.input',[
                    'errors' => $errors,
                    'name' => 'transport_cost',
                    'placeholder' => 'Enter Transportation Cost',
                    'icon' => 'truck',
                    'type' => 'number',
                ])
                @endcomponent

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Add</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@endsection
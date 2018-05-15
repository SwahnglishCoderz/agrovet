@extends('layouts.master')

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Stock</li>
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
            <p class="login-box-msg">Edit Stock
                <b>
                    {{$stock->product_name}} {{$stock->manufacturer_name}} {{$stock->concentration}}
                </b>
            </p>
            <!--
            | Error / Success Messages will be reported here.
            -->
            @include('messages.errors')

            <form action="/stock/update/{{$stock->id}}" method="post">
                {{csrf_field()}}
                <!------------------
                | Stock field
                ------------------->
                    @component('components.select-edit',[
                        'errors' => $errors,
                        'name' => 'product_name',
                        'placeholder' => '-- Select the Product Name --',
                        'icon' => 'industry',
                        'datas' => $products,
                        'value' => 'id',
                        'display' => '',
                        'main' => $stock,
                        'pre_value' => 'product_id'
                    ])
                        @slot('display_block')
                            @foreach($products as $product)
                                {{$product->product_name}} {{$product->manufacturer_name}} {{$product->concentration}}
                            @endforeach
                        @endslot
                    @endcomponent

                    @component('components.input-edit',[
                        'errors' => $errors,
                        'name' => 'quantity',
                        'placeholder' => 'Enter quantity',
                        'icon' => 'at',
                        'type' => 'text',
                        'data' => $stock
                    ])
                    @endcomponent

                    @component('components.input-edit',[
                        'errors' => $errors,
                        'name' => 'manufactured_date',
                        'placeholder' => 'Enter Date Manufactured',
                        'icon' => 'gears',
                        'type' => 'text',
                        'data' => $stock
                    ])
                    @endcomponent

                    @component('components.input-edit',[
                        'errors' => $errors,
                        'name' => 'expiry_date',
                        'placeholder' => 'Enter Expiry Date',
                        'icon' => 'calendar-alt',
                        'type' => 'text',
                        'data' => $stock
                    ])
                    @endcomponent

                    @component('components.input-edit',[
                        'errors' => $errors,
                        'name' => 'date_stocked',
                        'placeholder' => 'Enter Date Stocked',
                        'icon' => 'calendar',
                        'type' => 'text',
                        'data' => $stock
                    ])
                    @endcomponent

                    @component('components.input-edit',[
                        'errors' => $errors,
                        'name' => 'bought_price',
                        'placeholder' => 'Enter Bought Price',
                        'icon' => 'dollar',
                        'type' => 'text',
                        'data' => $stock
                    ])
                    @endcomponent

                    @component('components.input-edit',[
                        'errors' => $errors,
                        'name' => 'transport_cost',
                        'placeholder' => 'Enter Transportation Cost',
                        'icon' => 'truck',
                        'type' => 'text',
                        'data' => $stock
                    ])
                    @endcomponent

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@endsection
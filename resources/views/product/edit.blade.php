@extends('layouts.master')

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Product</li>
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
            <p class="login-box-msg">Edit Product
                <b>
                    {{$product->product_name}}
                </b>
            </p>
            <!--
            | Error / Success Messages will be reported here.
            -->
            @include('messages.errors')

            <form action="/product/update/{{$product->id}}" method="post">
                {{csrf_field()}}

                <!------------------
                | Product Name field
                ------------------->
                @component('components.input-edit',[
                    'errors' => $errors,
                    'name' => 'product_name',
                    'placeholder' => 'Enter the Product Name',
                    'type' => 'text',
                    'icon' => 'industry',
                    'data' => $product,
                ])
                @endcomponent

                <!------------------
                | Manufacturer Name field
                ------------------->
                @component('components.select-edit',[
                    'errors' => $errors,
                    'name' => 'manufacturer_name',
                    'placeholder' => '-- Select the Product Name --',
                    'icon' => 'gears',
                    'datas' => $manufacturers,
                    'display' => 'manufacturer_name',
                    'value' => 'id',
                    'main' => $product,
                    'pre_value' => 'manufacturer_id',
                ])
                @endcomponent

                <!------------------
                | Type Name field
                ------------------->
                @component('components.select-edit',[
                    'errors' => $errors,
                    'name' => 'type_name',
                    'placeholder' => '-- Select the Product Type --',
                    'icon' => 'shopping-basket',
                    'datas' => $types,
                    'display' => 'type_name',
                    'value' => 'id',
                    'main' => $product,
                    'pre_value' => 'type_id',
                ])
                @endcomponent

                <!------------------
                | Product Name field
                ------------------->
                    @component('components.input-edit',[
                        'errors' => $errors,
                        'name' => 'concentration',
                        'placeholder' => 'Enter the Product Concentration',
                        'type' => 'text',
                        'icon' => 'industry',
                        'data' => $product,

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
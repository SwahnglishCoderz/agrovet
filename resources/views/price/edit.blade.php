@extends('layouts.master')

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Price</li>
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
            <p class="login-box-msg">Edit Price
                <b>
                    {{ \App\Product::where('id',$price->product_id)->first()->product_name}}
                </b>
            </p>
            <!--
            | Error / Success Messages will be reported here.
            -->
            @include('messages.errors')

            <form action="/price/update/{{$price->id}}" method="post">
                {{csrf_field()}}
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
                
                <!------------------
                | Price Name field
                ------------------->
                @component('components.input-edit',[
                    'errors' => $errors,
                    'name' => 'price',
                    'placeholder' => 'Enter the Price',
                    'type' => 'text',
                    'icon' => 'dollar',
                    'data' => $price,
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
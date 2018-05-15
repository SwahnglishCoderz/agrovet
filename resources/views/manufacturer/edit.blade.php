@extends('layouts.master')

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Manufacturer</li>
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
            <p class="login-box-msg">Edit Manufacturer
                <b>
                    {{$manufacturer->manufacturer_name}}
                </b>
            </p>
            <!--
            | Error / Success Messages will be reported here.
            -->
            @include('messages.errors')

            <form action="/manufacturer/update/{{$manufacturer->id}}" method="post">
                {{csrf_field()}}
                <!------------------
                | Manufacturer Name field
                ------------------->
                @component('components.input-edit',[
                    'errors' => $errors,
                    'name' => 'manufacturer_name',
                    'placeholder' => 'Enter the Manufacturer Name',
                    'type' => 'text',
                    'icon' => 'graducation-cap',
                    'data' => $manufacturer,
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
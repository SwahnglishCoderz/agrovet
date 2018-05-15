@extends('layouts.master')

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Type</li>
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
            <p class="login-box-msg">Add a new Type</p>
            <!--
            | Error / Success Messages will be reported here.
            -->
            @include('messages.errors')

            <form action="/type/store" method="post">
                {{csrf_field()}}
                <!------------------
                | Type Name field
                ------------------->
                @component('components.input',[
                    'errors' => $errors,
                    'name' => 'type_name',
                    'placeholder' => 'Enter the Type Name',
                    'type' => 'text',
                    'icon' => 'industry'
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
@extends('layouts.master')

@section('header')
    View Stocks
    <!--<small>Optional description</small>-->
@endsection

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Stocks</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!--<div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div>-->
                <!-- /.box-header -->
                <div class="box-body">
                    @include('messages.errors')

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Manufactured Date</th>
                            <th>Expiry Date</th>
                            <th>Date Stocked</th>
                            <th>Bought Price</th>
                            <th>Transport Cost</th>
                            <th>Modify</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($stocks)>=1)
                            @foreach($stocks as $stock)
                                <tr>
                                    <td id="name">
                                        {{$stock->product_name}} {{$stock->manufacturer_name}} {{$stock->concentration}}
                                    </td>
                                    <td>
                                        {{$stock->quantity}}
                                    </td>
                                    <td>
                                        {{$stock->manufactured_date}}
                                    </td>
                                    <td>
                                        {{$stock->expiry_date}}
                                    </td>
                                    <td>
                                        {{$stock->date_stocked}}
                                    </td>
                                    <td>
                                        {{$stock->bought_price}}
                                    </td>
                                    <td>
                                        {{$stock->transport_cost}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/stock/edit/{{$stock->id}}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    value="/stock/delete/{{$stock->id}}"
                                                    data-target="#modal-danger" onclick="deleteStock(this.value)">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                            <a href="/stock/show/{{$stock->id}}" type="button" class="btn btn-info btn-sm">
                                                <i class="fa fa-info"></i> View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                No Products Added yet!
                            </div>
                        @endif
                        <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Manufactured Date</th>
                            <th>Expiry Date</th>
                            <th>Date Stocked</th>
                            <th>Bought Price</th>
                            <th>Transport Cost</th>
                            <th>Modify</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                @component('components.modals',[
                    'type' => 'danger',
                    'icon' => 'ban',
                    'title' => 'Delete Stock',
                    'ok_link' => "#",
                    'ok_text' => 'Yes',
                ])
                    @slot('body')
                        Are you sure you want to delete Stock <b><span id='stockName'></span></b> ?
                    @endslot

                @endcomponent

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#example1').DataTable();
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        });

        function deleteStock(value) {
            $('#ok_block').attr('href',value);
            var name = $('#name').text();
            $('#stockName').text(name);
        }
    </script>
@endsection
@extends('layouts.master')

@section('header')
    View Sales
    <!--<small>Optional description</small>-->
@endsection

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Sales</li>
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
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Date Sold</th>
                            <th>Cost</th>
                            <th>Modify</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($sales)>=1)
                            @foreach($sales as $sale)
                                <tr>
                                    <td id="name">
                                        {{$sale->product_name}} {{$sale->manufacturer_name}} {{$sale->concentration}}
                                    </td>
                                    <td>
                                        {{$sale->quantity}}
                                    </td>
                                    <td>
                                        {{$sale->date_sold}}
                                    </td>
                                    <td>
                                        {{$sale->cost}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/sale/edit/{{$sale->id}}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    value="/sale/delete/{{$sale->id}}"
                                                    data-target="#modal-danger" onclick="deleteSale(this.value)">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                            <a href="/sale/show/{{$sale->id}}" type="button" class="btn btn-info btn-sm">
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
                                No Sales Added yet!
                            </div>
                        @endif
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Date Sold</th>
                            <th>Cost</th>
                            <th>Modify</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                @component('components.modals',[
                    'type' => 'danger',
                    'icon' => 'ban',
                    'title' => 'Delete Manufacturer',
                    'ok_link' => "#",
                    'ok_text' => 'Yes',
                ])
                    @slot('body')
                        Are you sure you want to delete Sale of <b><span id='saleName'></span></b> ?
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

        function deleteSale(value) {
            $('#ok_block').attr('href',value);
            var name = $('#name').text();
            $('#saleName').text(name);
        }
    </script>
@endsection
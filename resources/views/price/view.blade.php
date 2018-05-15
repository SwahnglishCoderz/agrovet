@extends('layouts.master')

@section('header')
    View Prices
    <!--<small>Optional description</small>-->
@endsection

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Prices</li>
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
                            <th>Price</th>
                            <!--<th>Assigned To</th>-->
                            <th>Modify</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($prices)>=1)
                            @foreach($prices as $price)
                                <tr>
                                    <td id="name">
                                        {{ \App\Product::where('id',$price->product_id)->first()->product_name}}
                                    </td>
                                    <td>
                                        {{$price->price}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/price/edit/{{$price->id}}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    value="/price/delete/{{$price->id}}"
                                                    data-target="#modal-danger" onclick="deletePrice(this.value)">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                            <a href="/price/show/{{$price->id}}" type="button" class="btn btn-info btn-sm">
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
                                No Prices Added yet!
                            </div>
                        @endif
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
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
                        Are you sure you want to delete Price for <b><span id='productName'></span></b> ?
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

        function deletePrice(value) {
            $('#ok_block').attr('href',value);
            var name = $('#name').text();
            $('#productName').text(name);
        }
    </script>
@endsection
@extends('layouts.master')

@section('header')
    View Products
    <!--<small>Optional description</small>-->
@endsection

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Products</li>
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
                            <th>Manufacturer</th>
                            <th>Product Type</th>
                            <th>Concentration</th>
                            <th>Modify</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($products)>=1)
                            @foreach($products as $product)
                                <tr>
                                    <td id="name">
                                        {{$product->product_name}}
                                    </td>
                                    <td>
                                        {{\App\Manufacturer::where('id',$product->manufacturer_id)->first()->manufacturer_name}}
                                    </td>
                                    <td>
                                        {{\App\Type::where('id',$product->type_id)->first()->type_name}}
                                    </td>
                                    <td>
                                        {{$product->concentration}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/product/edit/{{$product->id}}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    value="/product/delete/{{$product->id}}"
                                                    data-target="#modal-danger" onclick="deleteProduct(this.value)">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                            <a href="/product/show/{{$product->id}}" type="button" class="btn btn-info btn-sm">
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
                            <th>Name</th>
                            <th>Manufacturer</th>
                            <th>Product Type</th>
                            <th>Created</th>
                            <th>Modify</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                @component('components.modals',[
                    'type' => 'danger',
                    'icon' => 'ban',
                    'title' => 'Delete Product',
                    'ok_link' => "#",
                    'ok_text' => 'Yes',
                ])
                    @slot('body')
                        Are you sure you want to delete Product <b><span id='productName'></span></b> ?
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

        function deleteProduct(value) {
            $('#ok_block').attr('href',value);
            var name = $('#name').text();
            $('#productName').text(name);
        }
    </script>
@endsection
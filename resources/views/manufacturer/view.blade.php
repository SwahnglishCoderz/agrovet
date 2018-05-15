@extends('layouts.master')

@section('header')
    View Manufacturers
    <!--<small>Optional description</small>-->
@endsection

@section('navigate')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Manufacturers</li>
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
                            <th>Created</th>
                            <!--<th>Assigned To</th>-->
                            <th>Modify</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($manufacturers)>=1)
                            @foreach($manufacturers as $manufacturer)
                                <tr>
                                    <td id="{{$manufacturer->manufacturer_name}}_{{$manufacturer->id}}">
                                        {{$manufacturer->manufacturer_name}}
                                    </td>
                                    <td>
                                        {{$manufacturer->created_at}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/manufacturer/edit/{{$manufacturer->id}}" type="button" class="btn btn-warning btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    value="/manufacturer/delete/{{$manufacturer->id}}"
                                                    data-target="#modal-danger" 
                                                    onclick="deleteManufacturer('{{$manufacturer->manufacturer_name}}_{{$manufacturer->id}}',this.value)">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                            <a href="/manufacturer/show/{{$manufacturer->id}}" type="button" class="btn btn-info btn-sm">
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
                                No Manufacturers Added yet!
                            </div>
                        @endif
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Duration</th>
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
                        Are you sure you want to delete Manufacturer <b><span id='manufacturerName'></span></b> ?
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

        function deleteManufacturer(id,value) {
            $('#ok_block').attr('href',value);
            var name = $('#'+id).text();
            $('#manufacturerName').text(name);
        }
    </script>
@endsection
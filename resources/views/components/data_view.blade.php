<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        {{$headers}}
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($datas)>=1)
                        @foreach($datas as $data)
                            <tr>
                                <td id="name">
                                    {{$name_data}}
                                </td>
                                    {{$other_data}}
                                <td>
                                    <div class="btn-group">
                                        <a href="/{{$link}}/edit/{{$data->id}}" type="button" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                value="/{{$link}}/delete/{{$data->id}}"
                                                data-target="#modal-danger" onclick="delete{{$title}}(this.value)">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                        <a href="/{{$link}}/show/{{$data->id}}" type="button" class="btn btn-info btn-sm">
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
                            No {{$title}}s Added yet!
                        </div>
                    @endif
                    <tfoot>
                    <tr>
                        {{$headers}}
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@component('components.modals',[
    'type' => 'danger',
    'icon' => 'ban',
    'title' => "Delete $title",
    'ok_link' => "#",
    'ok_text' => 'Yes',
])
    @slot('body')
        Are you sure you want to delete {{$title}} <b><span id='{{$id}}Name'></span></b> ?
    @endslot

@endcomponent

@section('scripts')
    <script>
        $(function () {
            $('#example1').DataTable();

        });

        function delete{{$title}}(value) {
            $('#ok_block').attr('href',value);
            var name = $('#name').text();
            $('#{{$id}}Name').text(name);
        }
    </script>

@endsection

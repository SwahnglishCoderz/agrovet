<div class="form-group has-feedback{{ $errors->has($name) ? ' has-error' : '' }}">
	<select class="form-control" name="{{$name}}">
		<option value="">-- {{$placeholder}} --</option>
        @if($display != null)
            @foreach ($datas as $data)
                <option value="{{$data->$value}}">
                {{$data->$display}}
                </option>
            @endforeach
        @else
            {{$display_block}}
        @endif
	</select>
    
    <span class="fa fa-{{$icon}} form-control-feedback"></span>
    @if ($errors->has($name))
        <span class="invalid-feedback">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
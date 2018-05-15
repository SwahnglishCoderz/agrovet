{{--
 $name - name of the field
 $placeholder - placeholder value for empty selection
 $datas - variable to populate select
 $value - value to store in the database
 $display - value to show in the select option
 $main - main variable with previous data
 $pre_value - variable with previous select data
 $icon - icon for the select field.
 --}}

<div class="form-group has-feedback{{ $errors->has($name) ? ' has-error' : '' }}">
	<select class="form-control" name="{{$name}}">
		<option value="">-- {{$placeholder}} --</option>
        @if($display != null)
            @foreach ($datas as $data)
                <option value="{{$data->$value}}"
                @if($main->$pre_value == $data->$value) selected @endif>
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
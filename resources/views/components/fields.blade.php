<!-------------------------------------------
| This is the sample div used
| $name - for the name of the field
| $placeholder - for the placeholder of the field
| $icon - for the glyphicon of the field
| $type - for the type of the field
--------------------------------------------->

<div class="form-group has-feedback{{ $errors->has($name) ? ' has-error' : '' }}">
    <input type="{{$type}}" class="form-control" name="{{$name}}" value="{{ old($name) }}" placeholder="{{$placeholder}}">
    <span class="glyphicon glyphicon-{{$icon}} form-control-feedback"></span>
    @if ($errors->has($name))
        <span class="invalid-feedback">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
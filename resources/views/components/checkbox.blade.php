<div class="col-xs-8{{ $errors->has($name) ? ' has-error' : '' }}">
    <div class="checkbox icheck">
        <label>
            <input type="checkbox" name="{{$name}}"> {{$message}}
        </label>
    </div>
    @if ($errors->has($name))
        <span class="invalid-feedback">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
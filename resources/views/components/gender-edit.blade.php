<!-- radio -->
<div class="form-group has-feedback{{ $errors->has('gender') ? ' has-error' : '' }}" >
    <label>
        <input type="radio" name="gender" value="male" class="minimal" 
        {{ old('gender')=='male' || $data->gender=='male' ? ' checked' : '' }} >
        Male
    </label>
    <label>
        <input type="radio" name="gender" class="minimal"
        {{ old('gender')=='female' || $data->gender=='female' ? ' checked' : '' }} >
        Female
    </label>
    <br>
    @if ($errors->has('gender'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>
    @endif
</div>

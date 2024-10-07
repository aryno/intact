@if ($errors->has($name))
    <small class="form-text text-danger font-weight-bold">
        <strong>{{ $errors->first($name) }}</strong>
    </small>
@endif

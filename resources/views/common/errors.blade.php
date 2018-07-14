@if ($errors->has($name))
    <span class="invalid-feedback">
        <strong>{{ $errors->first($name) }}</strong>
    </span>
@endif
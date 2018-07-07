@if (session($name))
    <div class="alert alert-success">
        {{ session($name) }}
    </div>
@endif
<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name">Nome da série:</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control"
            minlength="3"
            required
            autocomplete="off"
            @isset($name) value="{{ $name }}" @endisset 
        />
    </div>

    <button type="submit" class="btn btn-primary mt-2">Enviar</button>
</form>
<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="nome">Nome da série:</label>
        <input 
            type="text" 
            name="nome" 
            id="nome" 
            class="form-control"
            minlength="3"
            required
            @isset($nome) value="{{ $nome }}" @endisset 
        />
    </div>

    <button type="submit" class="btn btn-primary mt-2">Enviar</button>
</form>
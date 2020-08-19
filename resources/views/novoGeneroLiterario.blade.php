@extends('layout.app',["current" => "generos_literarios"])
@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/gen_literarios" method="POST">
            @csrf
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection
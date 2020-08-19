@extends('layout.app',["current" => "editoras"])
@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/editoras/{{$editora->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control {{$errors->has('descricao') ? 'is-invalid' : '' }}" name="descricao" id="descricao" placeholder="Editora" value="{{$editora->descricao}}">
                @if($errors->has('descricao'))
                    <div class="invalid-feedback">
                    {{$errors->first('descricao')}}  
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection
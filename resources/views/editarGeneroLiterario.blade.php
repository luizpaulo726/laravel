@extends('layout.app',["current" => "gen_literarios"])
@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/gen_literarios/{{ $gen_literario->id }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control {{$errors->has('descricao') ? 'is-invalid' : '' }}" name="descricao" id="descricao" placeholder="Editora" value="{{$gen_literario->descricao}}">
                @if($errors->has('descricao'))
                    <div class="invalid-feedback">
                    {{$errors->first('descricao')}}  
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a type="btn btn-primary btn-sm" class="btn btn-danger btn-sm" href="/gen_literarios">Cancelar</a>
        </form>
    </div>
</div>
@endsection
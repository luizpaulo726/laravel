@extends('layout.app',["current" => "autores"])
@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/autores/{{$autor->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeAutor">Nome do Autor</label>
                <input type="text" class="form-control {{$errors->has('nomeAutor') ? 'is-invalid' : '' }}" name="nomeAutor" id="nomeAutor" placeholder="Autor" value="{{$autor->nome}}">
                @if($errors->has('nomeAutor'))
                    <div class="invalid-feedback">
                    {{$errors->first('nomeAutor')}}  
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <input type="text" class="form-control" name="sexo" id="sexo" placeholder="Sexo" value="{{$autor->sexo}}">
            </div>
            <div class="form-group">
                <label for="nacionalidade">Nacionalidade</label>
                <input type="text" class="form-control" name="nacionalidade" id="nacionalidade" value="{{$autor->nacionalidade}}"> 
            </div>
            <div class="form-group">
                <label for="nascimento">Nascimento</label>
                <input type="date" class="form-control" name="nascimento" id="nascimento" value="{{$autor->nascimento}}"> 
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a type="btn btn-primary btn-sm" class="btn btn-danger btn-sm" href="/autores">Cancelar</a>
        </form>
    </div>
</div>
@endsection
@extends('layout.app',["current" => "autores"])
@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/autores" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeAutor">Nome do Autor</label>
                <input type="text" class="form-control {{$errors->has('nomeAutor') ? 'is-invalid' : '' }}" name="nomeAutor" id="nomeAutor" placeholder="Autor">
                @if($errors->has('nomeAutor'))
                    <div class="invalid-feedback">
                    {{$errors->first('nomeAutor')}}  
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <input type="text" class="form-control {{$errors->has('sexo') ? 'is-invalid' : '' }}" name="sexo" id="sexo" placeholder="Sexo">
                @if($errors->has('sexo'))
                    <div class="invalid-feedback">
                    {{$errors->first('sexo')}}  
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="nacionalidade">Nacionalidade</label>
                <input type="text" class="form-control" name="nacionalidade" id="nacionalidade">

            </div>
            <div class="form-group">
                <label for="nascimento">Nascimento</label>
                <input type="date" class="form-control {{$errors->has('nascimento') ? 'is-invalid' : '' }}" name="nascimento" id="nascimento">
                @if($errors->has('nascimento'))
                    <div class="invalid-feedback">
                    {{$errors->first('nascimento')}}  
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection
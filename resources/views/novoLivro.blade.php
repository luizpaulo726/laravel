@extends('layout.app',["current" => "livros"])
@section('body')
<div class="card border">
    <div class="card-body">
        <form action="/livros" method="POST">
            @csrf
            <div class="form-group">
                <label for="descricao">Título</label>
                <input type="text" class="form-control {{$errors->has('titulo') ? 'is-invalid' : '' }}" name="titulo" id="titulo" placeholder="Título">
                @if($errors->has('titulo'))
                    <div class="invalid-feedback">
                    {{$errors->first('titulo')}}  
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="descricao">Ano Lançamento</label>
                <input type="text" class="form-control" name="ano_lancamento" id="ano_lancamento" placeholder="Ano">
            </div>
            <div class="form-group">
                <label for="descricao">Autor</label>
                <select class="form-control  {{$errors->has('id_autor') ? 'is-invalid' : '' }}" name="id_autor" id="id_autor" aria-describedby="validationAutor">
                    <option value="">Selecione..</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" >{{ $autor->nome }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_autor'))
                    <div id="validationAutor" class="invalid-feedback">
                    {{$errors->first('id_autor')}}  
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="descricao">Editora</label>
                <select class="form-control {{$errors->has('id_editora') ? 'is-invalid' : '' }}" name="id_editora" id="id_editora" aria-describedby="validationEditora"   >
                <option value="">Selecione...</option>  
                    @foreach($editoras as $editora)
                        <option value="{{$editora->id}}">{{$editora->descricao}}</option>
                    @endforeach   
                </select>
                
                 @if($errors->has('id_editora'))
                    <div id="validationEditora" class="invalid-feedback">
                    {{$errors->first('id_editora')}}  
                    </div>
                @endif

            </div>
            <div class="form-group">
                <label for="descricao">Gênero Literário</label>
                <select class="form-control  {{$errors->has('id_gen_literario') ? 'is-invalid' : '' }}" name="id_gen_literario" id="id_gen_literario" aria-describedby="validationGenero">
                  <option value="">Selecione...</option>  
                   @foreach($gen_literarios as $gen_literario)
                    <option value="{{$gen_literario->id}}">{{$gen_literario->descricao}}</option>
                    @endforeach   
                </select>

                @if($errors->has('id_gen_literario'))
                    <div id="validationGenero" class="invalid-feedback">
                    {{$errors->first('id_gen_literario')}}  
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a type="btn btn-primary btn-sm" class="btn btn-danger btn-sm" href="/livros">Cancelar</a>
        </form>
    </div>
</div>
@endsection
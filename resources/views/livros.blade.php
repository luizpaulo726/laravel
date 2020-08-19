@extends('layout.app',["current" => "livros"])
@section('body')

@if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{session('mensagem')}}</p>
    </div>
@endif

@if(session('mensagem_erro'))
    <div class="alert alert-danger">
        <p>{{session('mensagem_erro')}}</p>
    </div>
@endif

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de livros</h5>
        @if(count($livros) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                <th>Titulo</th>
                <th>Ano</th>
                <th>Gênero Literario</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Ações</th>
                </thead>
                <tbody>
                
                @foreach($livros as $livro)
                    <tr>
                        <td>{{$livro->titulo}}</td>
                        <td>{{$livro->ano}}</td>
                        <td>{{$livro->genero_literario}}</td>
                        <td>{{$livro->nome_autor}}</td>
                        <td>{{$livro->nome_editora }}</td>
                        <td>
                            <a href="/livros/editar/{{$livro->id}}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="/livros/apagar/{{$livro->id}}" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
            @else
            <div class="alert alert-danger" role="alert">
               Nenhum livro encontrado!
            </div>
        @endif
    </div>
    <div class="card-footer">
        <a href="/livros/create" class="btn btn-sm btn-primary">Novo livro</a> 
    </div>
</div>
@endsection

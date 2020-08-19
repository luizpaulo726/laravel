@extends('layout.app',["current" => "autores"])
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
        <h5 class="card-title">Cadastro de autores</h5>
        @if(count($autores) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Nacionalidade</th>
                <th>Nascimento</th>
                <th>Ações</th>
                </thead>
                <tbody>
                
                @foreach($autores as $autor)
                    <tr>
                        <td>{{$autor->nome}}</td>
                        <td>{{$autor->sexo}}</td>
                        <td>{{$autor->nacionalidade}}</td>
                        <td>{{ date("d/m/Y", strtotime($autor->nascimento))}}</td>
                        <td>
                            <a href="/autores/editar/{{$autor->id}}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="/autores/apagar/{{$autor->id}}" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
            @else
            <div class="alert alert-danger" role="alert">
               Nenhum autor encontrado!
            </div>
        @endif
    </div>
    <div class="card-footer">
        <a href="/autores/create" class="btn btn-sm btn-primary">Novo autor</a> 
    </div>
</div>
@endsection

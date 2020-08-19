
@extends('layout.app',["current" => "editoras"])
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
        <h5 class="card-title">Cadastro de editoras</h5>
        @if(count($editoras) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                <th>Descricão</th>
                <th>Ações</th>
                </thead>
                <tbody>
                
                @foreach($editoras as $editora)
                    <tr>
                        <td>{{$editora->descricao}}</td>
                        <td>
                            <a href="/editoras/editar/{{$editora->id}}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="/editoras/apagar/{{$editora->id}}" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
            @else
            <div class="alert alert-danger" role="alert">
               Nenhuma editora encontrada!
            </div>
        @endif
    </div>
    <div class="card-footer">
        <a href="/editoras/create" class="btn btn-sm btn-primary">Nova editora</a> 
    </div>
</div>
@endsection
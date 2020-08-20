
@extends('layout.app',["current" => "gen_literarios"])
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
        <h5 class="card-title">Cadastro de Gêneros literários</h5>
        @if(count($GeneroLiterarios) > 0)
            <table class="table table-ordered table-hover">
                <thead>
                <th>Descricão</th>
                <th>Ações</th>
                </thead>
                <tbody>
                
                @foreach($GeneroLiterarios as $gen_literario)
                    <tr>
                        <td>{{$gen_literario->descricao}}</td>
                        <td>
                            <a href="/gen_literarios/editar/{{$gen_literario->id}}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="/gen_literarios/apagar/{{$gen_literario->id}}" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
            @else
            <div class="alert alert-danger" role="alert">
               Nenhum genero literario encontrada!
            </div>
        @endif
    </div>
    <div class="card-footer">
        <a href="/gen_literarios/create" class="btn btn-sm btn-primary">Novo Genero Literario</a> 
    </div>
</div>
@endsection
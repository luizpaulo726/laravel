@extends('layout.app',["current" => "home"])

@section('body')
<div class="jumbotron bg-light border border-secondary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary"> 
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Autores</h5>
                    <p class="card-text">
                        Aqui você cadastra os autores.
                    </p>
                    <a href="/autores" class="btn btn-primary">Cadastre de autores</a>
                </div>
            </div>
            <div class="card border border-primary"> 
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Editoras</h5>
                    <p class="card-text">
                        Aqui você cadastra as Editoras
                    </p>
                    <a href="/autores" class="btn btn-primary">Cadastro de editoras</a>
                </div>
            </div>
            <div class="card border border-primary"> 
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Gêneros Literários.</h5>
                    <p class="card-text">
                        Aqui você cadastra os gêneros Literários
                    </p>
                    <a href="/autores" class="btn btn-primary">Cadastre de Gen Literários</a>
                </div>
            </div>
            <div class="card border border-primary"> 
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Livros</h5>
                    <p class="card-text">
                        Aqui você cadastra os livros
                    </p>
                    <a href="/livros" class="btn btn-primary">Cadastre de livros</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

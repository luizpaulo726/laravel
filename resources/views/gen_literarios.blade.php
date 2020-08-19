
@extends('layout.app',["current" => "generos_literarios"])
@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Gêneros Literários</h5>
            <table class="table table-ordered table-hover" id="tabelaGenLiterarios">
                <thead>
                <th>Código</th>
                <th>Descricão</th>
                <th>Ações</th>
                </thead>
                <tbody>

                </tbody>
            </table>
    </div>
    <div class="card-footer">
        <button onclick="novoGeneroLiterario()" class="btn btn-sm btn-primary">Novo Gênero Literário</button> 
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgGenerosLiterarios" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formGenLiterario">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Gênero Literário</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomeAutor">Descrição</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" >
                     </div>
                     <input type="hidden" name="id"/>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                   <button type="cancel" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });


    function criarGeneroLiterario() {
        gen = {
            descricao : $("#descricao").val()
        };
        
        $.post('/api/gen_literarios',gen,function(data){
          var gen = data;  
          linha = montarLinha(gen);
          $('#tabelaGenLiterarios>tbody').append(linha);

        });
    }
        $("#formGenLiterario").submit(function(event){
            event.preventDefault();
            criarGeneroLiterario();
            $("#dlgGenerosLiterarios").modal('hide'); 
        
        });
    

    function novoGeneroLiterario() {
        $('#formGenLiterario')[0].reset();
        $("#dlgGenerosLiterarios").modal('show');
    }

    function carregarGenLiterarios() {
        $.getJSON('/api/gen_literarios',function(generos_literarios){
            for(i=0;i<generos_literarios.length;i++){
                linha = montarLinha(generos_literarios[i]);
              
                $('#tabelaGenLiterarios>tbody').append(linha);
            }
        });
    }

    function montarLinha(g) {
     
        var linha =
         "<tr>" +
            "<td>" + g.id + "</td>" +
            "<td>" + g.descricao + "</td>"+
            "<td><button class='btn btn-sm btn-primary' style='margin-right:3px'>Editar</button>"+
            "<button class='btn btn-sm btn-danger'>Excluir</button>"+
            "</td>"+
        "</tr>";
        console.log(linha);
        return linha;
    }


    $(function(){
        carregarGenLiterarios();
    });

</script>

@endsection
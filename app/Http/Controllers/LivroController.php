<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editora;
use App\GeneroLiterario;
use App\Autor;
use App\Livro;
use DB;


class LivroController extends Controller
{

    private $editora;
    private $gen_literario;
    private $livro;
    private $autor;

    public function __construct() {
      
        $this->editora = new Editora();
        $this->gen_literario = new GeneroLiterario();
        $this->autor = new Autor();
        $this->livro = new Livro();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $livros = DB::table('livros')
        ->join('editoras', 'livros.editora_id', '=', 'editoras.id')
        ->join('autores', 'livros.autor_id', '=', 'autores.id')
        ->join('generos_literarios', 'livros.gen_literario_id', '=', 'generos_literarios.id')
        ->select('livros.*', 'editoras.descricao as nome_editora', 'autores.nome as nome_autor', 'generos_literarios.descricao as genero_literario')
        ->orderBy('titulo','asc')
        ->get();

       return view('/livros', compact('livros',$livros));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $autores = $this->autor->all();
        $gen_literarios = $this->gen_literario->all();
        $editoras = $this->editora->all();

         return view('novoLivro')->with(compact('autores','gen_literarios','editoras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $regras = [
            'titulo' => 'required',
            'id_autor'  => 'required',
            'id_editora' => 'required',
            'id_gen_literario' =>'required'
        ];

        $mensagens = [
            'titulo.required' => 'Título obrigatório.',
            'id_autor.required'  => 'Autor obrigatório.',
            'id_editora.required'  => 'Editora obrigatório.',
            'id_gen_literario.required'  => 'Gênero Literário obrigatório.'
        ];

       $request->validate($regras,$mensagens);     

        $this->livro->titulo = $request['titulo'];
        $this->livro->ano = $request['ano_lancamento'];
        $this->livro->autor_id = $request['id_autor'];
        $this->livro->editora_id = $request['id_editora'];
        $this->livro->gen_literario_id = $request['id_gen_literario'];

        $this->livro->save();
        
        return redirect('/livros')->with('mensagem', 'Livro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $livro = $this->livro->find($id);

        if(isset($livro)) {

            $gen_literarios = $this->gen_literario->all();
            $editoras = $this->editora->all();
            $autores = $this->autor->all();
    
             return view('editarLivro')->with(compact('livro','gen_literarios','editoras','autores'));
        }

        return redirect('/livros')->with('mensagem_erro', 'Livro não encontrado!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $livro = $this->livro->find($id);

        
        if(isset($livro)) {

            $regras = [
                'titulo' => 'required',
                'id_autor'  => 'required',
                'id_editora' => 'required',
                'id_gen_literario' =>'required'
            ];
    
            $mensagens = [
                'titulo.required' => 'Título obrigatório.',
                'id_autor.required'  => 'Autor obrigatório.',
                'id_editora.required'  => 'Editora obrigatório.',
                'id_gen_literario.required'  => 'Gênero Literário obrigatório.'
            ];

            $request->validate($regras,$mensagens);     

            $livro->titulo = $request['titulo'];
            $livro->ano = $request['ano_lancamento'];
            $livro->autor_id = $request['id_autor'];
            $livro->editora_id = $request['id_editora'];
            $livro->gen_literario_id = $request['id_gen_literario'];
            $livro->save();

            return redirect('/livros')->with('mensagem', 'Livro atualizado com sucesso!');
        }

        return redirect('/livros')->with('mensagem_erro', 'Livro não encontrado!');

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $livro = $this->livro->find($id);

        if(isset($livro)) {
            $livro->delete();
            return redirect('/livros')->with('mensagem', 'Livro deletado com sucesso!');
        }

        return redirect('/livros')->with('mensagem_erro', 'Livro não encontrado!');
      
    }
}

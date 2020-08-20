<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneroLiterario;

class GeneroLiterarioController extends Controller
{

    private $GeneroLiterario;

    public function __construct() {
        $this->GeneroLiterario = new GeneroLiterario();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $GeneroLiterarios = $this->GeneroLiterario->all();


        return view('gen_literarios', compact('GeneroLiterarios', $GeneroLiterarios));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('novoGeneroLiterario');
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
            'descricao' => 'required'
        ];

        $mensagens = [
            'descricao.required' => 'A Descrição é obrigatória.'
        ];

        $request->validate($regras,$mensagens);   

        $this->GeneroLiterario->descricao = $request['descricao'];

        $this->GeneroLiterario->save();

        return redirect('/gen_literarios')->with('mensagem', 'Genero Literario cadastrada com sucesso!');

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
        $gen_literario = $this->GeneroLiterario->find($id);
   
        if(isset($gen_literario)) {
            return view('editarGeneroLiterario', compact('gen_literario', $gen_literario));
        }
        return redirect('/gen_literarios');
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

        $GeneroLiterario = $this->GeneroLiterario->find($id);

        if(isset($GeneroLiterario)) {

            $regras = [
                'descricao' => 'required'
            ];
    
            $mensagens = [
                'descricao.required' => 'O Nome do autor é obrigatório.'
            ];

            $request->validate($regras,$mensagens);   

            $GeneroLiterario->descricao = $request['descricao'];
            $GeneroLiterario->update();

            return redirect('/gen_literarios')->with('mensagem', 'Genero Literario atualizado com sucesso!');
        }

        return redirect('/gen_literarios')->with('mensagem_erro', 'Genero Literario não encontrada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $GeneroLiterario = $this->GeneroLiterario->find($id);

        if(isset($GeneroLiterario)) {
            $GeneroLiterario->delete();
            return redirect('/gen_literarios')->with('mensagem', 'Genero Literario excluído com sucesso!');;
        }        
        return redirect('/gen_literarios')->with('mensagem_erro', 'Genero Literario não encontrado!');
    
    }
}

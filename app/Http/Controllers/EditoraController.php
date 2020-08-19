<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editora;

class EditoraController extends Controller
{

    private $editora;

    public function __construct() {
        $this->editora = new Editora();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $editoras = $this->editora->all();


        return view('editoras', compact('editoras', $editoras));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('novaEditora');
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

        $this->editora->descricao = $request['descricao'];

        $this->editora->save();

        return redirect('/editoras')->with('mensagem', 'Editora cadastrada com sucesso!');

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
        $editora = $this->editora->find($id);
        if(isset($editora)) {
            return view('editarEditora', compact('editora', $editora));
        }
        return redirect('/editoras');
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

        $editora = $this->editora->find($id);

        if(isset($editora)) {

            $regras = [
                'descricao' => 'required'
            ];
    
            $mensagens = [
                'descricao.required' => 'O Nome do autor é obrigatório.'
            ];

            $request->validate($regras,$mensagens);   

            $editora->descricao = $request['descricao'];
            $editora->update();

            return redirect('/editoras')->with('mensagem', 'Editora atualizada com sucesso!');
        }

        return redirect('/editoras')->with('mensagem_erro', 'Editora não encontrada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editora = $this->editora->find($id);

        if(isset($editora)) {
            $editora->delete();
            return redirect('/editoras')->with('mensagem', 'Editora excluída com sucesso!');;
        }        
        return redirect('/editoras')->with('mensagem_erro', 'Editora não encontrada!');
    
    }
}

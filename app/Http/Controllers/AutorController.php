<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutorController extends Controller
{
    private $autor;

    public function __construct() {
        $this->autor = new Autor();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $autores = $this->autor->all()->sortBy('nome');
        
         return view('autores',compact('autores', $autores));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('novoAutor');
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
            'nomeAutor' => 'required',
            'sexo'  => 'required',
            'nascimento' => 'required'
        ];

        $mensagens = [
            'nomeAutor.required' => 'O Nome do autor é obrigatório.',
            'sexo.required'  => 'Sexo obrigatório.',
            'nascimento.required' => 'Nascimento obrigatório'
        ];

       $request->validate($regras,$mensagens);     

        $this->autor->nome = $request['nomeAutor'];
        $this->autor->sexo = $request['sexo'];
        $this->autor->nacionalidade = $request['nacionalidade'];
        $this->autor->nascimento = $request['nascimento'];

        $this->autor->save();
        return redirect('/autores')->with('mensagem', 'Autor cadastrado com sucesso!');
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
        $autor = $this->autor->find($id);
        if(isset($autor)) {
            return view('editarAutor', compact('autor', $autor));
        }
        return redirect('/autores');
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

        $autor = $this->autor->find($id);

        if(isset($autor)) {

            $regras = [
                'nomeAutor' => 'required',
                'sexo'  => 'required',
                'nascimento' => 'required'
            ];
    
            $mensagens = [
                'nomeAutor.required' => 'O Nome do autor é obrigatório.',
                'sexo.required'  => 'Sexo obrigatório.',
                'nascimento.required' => 'Nascimento obrigatório'
            ];

            $request->validate($regras,$mensagens);   

            $autor->nome = $request['nomeAutor'];
            $autor->sexo = $request['sexo'];
            $autor->nacionalidade = $request['nacionalidade'];
            $autor->nascimento = $request['nascimento'];
            $autor->update();

            return redirect('/autores')->with('mensagem', 'Autor atualizado com sucesso!');
        }

        return redirect('/autores')->with('mensagem_erro', 'Autor não encontrado!');
    

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
        $autor = $this->autor->find($id);

        if(isset($autor)) {
            $autor->delete();
            return redirect('/autores')->with('mensagem', 'Autor excluído com sucesso!');
        }

        return redirect('/autores')->with('mensagem_erro', 'Autor não encontrado!');
       
    }
}

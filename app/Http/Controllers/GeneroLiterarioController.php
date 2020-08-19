<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneroLiterario;
use DB;

class GeneroLiterarioController extends Controller
{

    private $generoLiterario;

    public function __construct() {
        $this->generoLiterario = new GeneroLiterario();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $generosLiterarios = $this->generoLiterario->all();
        return response()->json($generosLiterarios);

    }

    public function indexView()
    {
        //
      return view('gen_literarios');

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
        $this->generoLiterario->descricao = $request['descricao'];
        $this->generoLiterario->save();
        return response()->json($this->generoLiterario);
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
        $genLiterario = $this->generoLiterario->find($id);

        if(isset($genLiterario)) {
            $genLiterario->delete();
        }
        return redirect('/gen_literarios');
    }

    public function indexJson()
    {
        //
        $generosLiterarios = $this->generoLiterario->all();
        return response()->json($generosLiterarios);

    }
}

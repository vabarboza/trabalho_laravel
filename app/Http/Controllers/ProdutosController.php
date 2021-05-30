<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registos = DB::table('produtos')->get();
        return view('produtos.listar', ['produtos' => $registos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao' => 'required|min:5',
            'valor' => 'required|min:1',
            'quantidade' => 'required|min:1',
            'slug' => 'required|min:5'
        ]);

        $produto = [
            'descricao' => $request->input('descricao'),
            'valor' => $request->input('valor'),
            'quantidade' => $request->input('quantidade'),
            'slug' => $request->input('slug')
        ];

        if (DB::table('produtos')->insert($produto)) {
            return redirect('produtos')->with('status', 'Produto Cadastrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $registros = DB::table('produtos')->where('slug', $slug)->first();
        return view('produtos.exibir', ['produto' => $registros]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = DB::table('produtos')->where('id', $id)->first();
        return view('produtos.editar', ['produto' => $produto]);
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
        $validated = $request->validate([
            'descricao' => 'required|min:5',
            'valor' => 'required|min:1',
            'quantidade' => 'required|min:1',
            'slug' => 'required|min:5'
        ]);

        $produto = [
            'descricao' => $request->input('descricao'),
            'valor' => $request->input('valor'),
            'quantidade' => $request->input('quantidade'),
            'slug' => $request->input('slug')
        ];

        if (DB::table('produtos')->where('id', $id)->update($produto)) {
            return redirect('produtos')->with('status', 'Produto Editado!');
        } else {
            return redirect('produtos')->with('status', 'Nenhuma alteração efetuada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table('produtos')->where('id', $id)->delete()) {
            return redirect('produtos')->with('status', 'Produto Excluido!');
        } else {
            return redirect('produtos')->with('status', 'Nenhuma alteração efetuada!');
        }
    }
}

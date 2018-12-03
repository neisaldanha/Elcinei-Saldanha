<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use App\Model\Usuarios;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pessoa = Usuarios::get();
        return json_encode($pessoa);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $retorno = $request->all();
        $pessoa = new Usuarios();
        $pessoa->fill($retorno)->save();
        
        return $pessoa;
    
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
        $pessoa = Usuarios::where('COD_USUARIO',$id)->first();
        return  json_encode($pessoa);
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
        $input = $request->all();
        $pessoa = Usuarios::first($id);
        $pessoa->fill($input)->update();
        
        return $pessoa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $pessoa = Usuarios::where('COD_USUARIO',$id)->get();
            if ($pessoa){
                $pessoa->delete();
                return array('msg'=>'PlanoContas excluida com sucesso');
            } else
                throw new \Exception('PlanoContas não localizado');

        }catch (\Exception $e){
            return array('msg'=>'Erro: ' . $e->getMessage());
        }
    }
}

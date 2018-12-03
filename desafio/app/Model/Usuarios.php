<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use DB;

class Usuarios extends Model
{
    
    protected $fillable = ['COD_USUARIO','CPF','DES_NOME','CELULAR','EMAIL','created_at','updated_at'];


    public static function Salvar($id)
    {
        $client = connectionApi();
        $pessoa = new Usuarios();
        $pessoa->fill($id);
       
        $response = $client->post('criar',
            array(
                'headers'=>array('Content-Type'=>'application/json'),
                'json'=> $pessoa->ToArray()
            )
        );

        return json_decode($response->getBody(),true);
    }

    public static function setEdita($id){
        $client = connectionApi();
        $pessoa = new Usuarios();
        $pessoa->fill($id);
        dd($response = $client->post('edita/'.$id));
            array(
                'headers'=>array('Content-Type'=>'application/json'),
                'json'=> $pessoa->ToArray()
            )
        ;

        return json_decode($response->getBody(),true);
    }

    public static function getAtualiza($id)
    {
        $client = connectionApi();
        $pessoa = new Usuarios();
        $response = $client->get('get/'.$id,
            array(
                'headers'=>array('Content-Type'=>'application/json'),
                'json'=> $pessoa->ToArray()
            )
        );

        return json_decode($response->getBody(), true);
    }


    public static function getList(){
        $client = connectionApi();
        $response = $client->get('lista/');
        return json_decode($response->getBody(),true);
    }

   
    

}

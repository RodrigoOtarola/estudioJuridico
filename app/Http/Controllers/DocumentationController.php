<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{

    public function leyes(){
//        $api = Http::get('https://www.leychile.cl/Consulta/obtxml?opt=3&cantidad=5');
//        //dd($url);
//
//        $leyes = $api->json();

        /*$apiLeyes = Http::get('https://www.leychile.cl/Consulta/obtxml?opt=3&cantidad=5');
        $xml = simplexml_load_string( $apiLeyes);
        $json = json_encode($xml);
        dd($leyes = json_decode($json, TRUE));*/

        $apiLeyes = Http::get('https://www.leychile.cl/Consulta/obtxml?opt=3&cantidad=5');
        $xml = simplexml_load_string($apiLeyes);
        $collect = collect((array)$xml->xpath('NORMA'));
        $registros = collect();

        foreach ($collect as $item) {
            //Asignar un ID
            $idNorma = (int)$item->attributes()->idNorma;
            //Obtener el organismo
            $organismos = (array)$item->xpath('ORGANISMOS')[0];

            //Fecha de Publicación, Título y el Organismo
            $registro = [
                'fecha_publicacion' => (string)$item->FECHA_PUBLICACION,
                'titulo' => (string)$item->TITULO,
                'organismo' => (string)$organismos['ORGANISMO']
            ];

            $registros->put($idNorma, $registro);
        }

        $registros->toArray();

        return view('documentation', compact('registros'));
    }

    public function feriados(){

        //$feriados = array();

        $apiFeriados = Http::get('https://apis.digital.gob.cl/fl/feriados/2022');
        //dd($url);

        $feriados = $apiFeriados->json();

        return view('documentation', compact('feriados'));
    }
}

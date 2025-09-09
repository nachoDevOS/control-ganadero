<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MicroServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tokenGenerator()
    {   
        $data = [
            'systemId' => 'https://whatsapp.soluciondigital.dev', //Solicitante
            'microservice' => 'https://whatsapp-api.soluciondigital.dev',
            'payload'=> ''
        ];

        $token = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post('https://token-api.soluciondigital.dev/api/tokens/generate', $data);

        $token = json_decode($token, true);
        
        return $token['token'];
    }



    public function message()
    {        

        $servidor = 'https://whatsapp-api.soluciondigital.dev';

        $id = 'solucion-digital';
        Http::post($servidor.'/send?id='.$id, [
                    'phone' => '59167285914',
                    'text' => 'Gracias por su preferencia!',
                ]);

        return true;

        



    }

}

<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Enviar mensaje a través de la API de WhatsApp.
     */
    public function sendMessage($data)
    {
        // Validar los datos enviados en la solicitud
        // $request->validate([
        //     'type' => 'required|string',
        //     'number' => 'required|string',
        //     'message' => 'nullable|string',
        //     'pdfBase64' => 'nullable|string', // Url pdf
        //     'nameFile ' => 'nullable|string',
        //     'imageUrl ' => 'nullable|string'
        // ]);

        // Agregar prefijo +57 al número
        $data['number'] = '57' . ltrim($data['number'], '+'); 

        // Configurar el payload según el tipo
        $payload = [
            'type' => $data['type'],
            'number' => $data['number'],
        ];

        switch ($data['type']) {
            case 'texto':
                $payload['message'] = $data['message'];
                break;

            case 'imagen':
                $payload['message'] = $data['message'];
                $payload['imageUrl'] = $data['imageUrl'];
                break;

            case 'pdf':
                $payload['pdfBase64'] = $data['pdfBase64'];
                $payload['nameFile'] = $data['nameFile'];
                break;
        }
        // Configurar el token de autorización (Bearer Token)
        $token = new JwtWhatsappController();

        $token = $token->createToken(); 

        if($token['success'] == false){
            throw new Exception("Ocurrio un error generando el token");            
        }
        try {
            $url = env('ENDPOINT_API_WHATSAPP_NODE');

            $client = new Client();
            $response = $client->post($url.'/send-message', [
                'json' => $payload,
                'headers' => [
                    'Authorization' => 'Bearer ' . $token['token']
                ]
            ]);

            // Obtener el cuerpo de la respuesta
            $responseBody = $response->getBody();
            $data = json_decode($responseBody, true);
            
            return [
                'success' => false,
                'message' => 'Se envio correctamente el mensaje.',
                'data' => $data,
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Ocurrió un error al enviar el mensaje.',
                'details' => $e->getMessage(),
            ];
        }
    }
}

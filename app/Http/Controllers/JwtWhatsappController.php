<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtWhatsappController extends Controller
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
     * Generar un token JWT.
     */
    public function createToken()
    {

        try {
            $secretKey = env('JWT_WHATSAPP_SECRET_KEY');

            // Información del payload
            $payload = [
                'iat' => time(),                    // Fecha de emisión
                'exp' => time() + (60 * 60),        // Fecha de expiración (1 hora)
                'email' => 'Plataforma',     // Email del usuario
            ];
    
            // Generar el token JWT
            $jwt = JWT::encode($payload, $secretKey, 'HS256');
    
            return [
                'success' => true,
                'token' => $jwt,
            ];

        } catch (Exception $e) {
            return [
                'success' => false,
                'token' => $e->getMessage(),
            ];
        }

    }

    /**
     * Decodificar un token JWT (opcional).
     */
    public function decodeToken(Request $request)
    {
        // Validar el token en el request
        $request->validate([
            'token' => 'required|string',
        ]);

        // Clave secreta
        $secretKey = env('JWT_WHATSAPP_SECRET_KEY');

        try {
            // Decodificar el token
            $decoded = JWT::decode($request->input('token'), new Key($secretKey, 'HS256'));

            return response()->json([
                'status' => 'success',
                'data' => $decoded,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token inválido o expirado.',
                'details' => $e->getMessage(),
            ], 400);
        }
    }
}

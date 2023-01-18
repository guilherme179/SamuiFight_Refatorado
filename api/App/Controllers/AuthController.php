<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\DAO\BaseAcessosDAO;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class AuthController{

    public function login(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();
        $usuarioModel = new UsuarioModel;
        $BaseAcessosDAO = new BaseAcessosDAO();
        
        if(!empty($data['usuario']) || !empty($data['senha']) || !empty($data['site'])) {
            $usuario = $data['usuario'];
            $senha = $data['senha'];
            $site = $data['site'];

            //inicializando curl
            $curl = curl_init();
        
            //corpo da requisição
            $body = '{
                "site": "' . $site . '",
                "login": "' . $usuario . '",
                "senha": "' . $senha . '"
            }';
        
            // echo $body ;
            
            //config req
            curl_setopt_array($curl, [
                CURLOPT_URL => 'http://10.71.201.251/apps/qualihelp_v2/api/login',
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json; charset=UTF-8"
                ),
            ]);
        
            $resposta = curl_exec($curl);
            $data = json_decode($resposta, true);

            if($data['erro'] === "false"){
                $expiredAt = (new \DateTime('now'))->modify('+1 day')->format('Y-m-d H:i:s');

                $payload = [
                    "exp" => (new \DateTime($expiredAt))->getTimestamp(),
                    "iat" => time(),
                    "NOME" => $data['user_data'][0]['NOME'],
                    "AUTO_APELIDO_GESTORES" => $data['user_data'][0]['AUTO_APELIDO_GESTORES'],
                    "FUNCAO" => $data['user_data'][0]['FUNCAO'],
                    "SUPERVISOR" => $data['user_data'][0]['SUPERVISOR'],
                    "COORDENADOR" => $data['user_data'][0]['COORDENADOR'],
                    "SERVICO" => $data['user_data'][0]['SERVICO'],
                    "MATRICULA" => $data['user_data'][0]['MATRICULA'],
                    "LOGIN_REDE" => $data['user_data'][0]['LOGIN_REDE'],
                ];

                $token = JWT::encode($payload, '$2y$10$HqqlC5xRnQvXZcN6kJCZdOmuz/7Y0kvTO4SaC8tvevuIDuXfbrOgW', 'HS256'); 

                $usuarioModel->setNome($data['user_data'][0]['NOME']);
                $usuarioModel->setMatricula($data['user_data'][0]['MATRICULA']);
                $usuarioModel->setLogin($data['user_data'][0]['LOGIN_REDE']);

                $BaseAcessosDAO->insertBaseAcesso($usuarioModel);

                $response = $response->withJson([
                    "token" => $token,
                    "status" => "202"
                ]);

                return $response;
            } else {
                $response = $response->withJson([
                    "status" => "401"
                ]);

                return $response;
            }
        } else {
            $response = $response->withJson([
                "status" => "406"
            ]);

            return $response;
        }       
        
    }    
}
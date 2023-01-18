<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\DAO\TreinoDAO;
use App\Models\TreinoModel;

final class TreinoController{


    public function getTreino(Request $request, Response $response, array $args): Response{
        
        $treinoDAO = new TreinoDAO();

        $treino = $treinoDAO->getTodosTreino();
        $response = $response->withJson($treino);

        return $response;
    }

    public function medimagemSemVagaDemaisDias(Request $request, Response $response, array $args){
        
        $data = $request->getParsedBody();

        $treinoDAO = new TreinoDAO();
        $treino = new TreinoModel();

        if(empty($data['nome_operador']) || empty($data['nome_supervisor']) || empty($data['numero']) || empty($data['cpf']) || empty($data['agendamento'])){
            
            $response = $response->withJson([
                'status' => 'error',
                'code' => '406'
            ]);
            return $response;
            
        } else {

            $treino->setNome_operador($data['nome_operador']);
            $treino->setNumero_cliente($data['numero']);
            $treino->setCpf_cliente($data['cpf']);

        }
    
        $treinoDAO->insertMedimagemSemVagaDemaisDias($treino);

        $response = $response->withJson([
            'status' => 'success',
            'code' => '200'
        ]);

        return $response;
    }
    
}
<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\DAO\PlanejamentoDAO;
use App\Models\PlanejamentoModel;

final class PlanejamentoController{


    public function getPlanejamento(Request $request, Response $response, array $args): Response{
        
        $planejamentoDAO = new PlanejamentoDAO();

        $planejamento = $planejamentoDAO->getPlanejamento();
        $response = $response->withJson($planejamento);

        return $response;
    }

    public function medimagemSemVagaDemaisDias(Request $request, Response $response, array $args){
        
        $data = $request->getParsedBody();

        $planejamentoDAO = new planejamentoDAO();
        $planejamento = new PlanejamentoModel();

        if(empty($data['nome_operador']) || empty($data['nome_supervisor']) || empty($data['numero']) || empty($data['cpf']) || empty($data['agendamento'])){
            
            $response = $response->withJson([
                'status' => 'error',
                'code' => '406'
            ]);
            return $response;
            
        } else {

            $planejamento->setNome_operador($data['nome_operador']);
            $planejamento->setNumero_cliente($data['numero']);
            $planejamento->setCpf_cliente($data['cpf']);

        }
    
        $planejamentoDAO->insertMedimagemSemVagaDemaisDias($planejamento);

        $response = $response->withJson([
            'status' => 'success',
            'code' => '200'
        ]);

        return $response;
    }
    
}
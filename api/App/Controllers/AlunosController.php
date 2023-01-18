<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\DAO\AlunosDAO;
use App\Models\AlunosModel;

final class AlunosController{

    public function getTodosAlunos(Request $request, Response $response, array $args): Response{
        
        $AlunosDAO = new AlunosDAO();

        $alunos = $AlunosDAO->getTodosAlunos();
        $response = $response->withJson($alunos);

        return $response;
    }

    public function editAluno(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $AlunosDAO = new AlunosDAO();
        $formulario = new AlunosModel();

        if(empty($data['nome']) || empty($data['idade']) || empty($data['contato']) || empty($data['horario']) || empty($data['modalidade']) || empty($data['vencimento'])){
            
            $response = $response->withJson([
                'status' => 'error',
                'code' => '406'
            ]);
            return $response;
            
        } else {

            $formulario->setId($data['id']);
            $formulario->setNome($data['nome']);
            $formulario->setIdade($data['idade']);
            $formulario->setContato($data['contato']);
            $formulario->setHorario($data['horario']);
            $formulario->setModalidade($data['modalidade']);
            $formulario->setVencimento($data['vencimento']);

        }
    
        $AlunosDAO->editAluno($formulario);

        $response = $response->withJson([
            'status' => 'success',
            'code' => '200'
        ]);

        return $response;
    }

    public function insertAluno(Request $request, Response $response, array $args){
        
        $data = $request->getParsedBody();

        $AlunosDAO = new AlunosDAO();
        $formulario = new AlunosModel();

        if(empty($data['nome']) || empty($data['idade']) || empty($data['contato']) || empty($data['horario']) || empty($data['modalidade']) || empty($data['vencimento'])){
            
            $response = $response->withJson([
                'status' => 'error',
                'code' => '406'
            ]);
            return $response;
            
        } else {

            $formulario->setId($data['id']);
            $formulario->setNome($data['nome']);
            $formulario->setIdade($data['idade']);
            $formulario->setContato($data['contato']);
            $formulario->setHorario($data['horario']);
            $formulario->setModalidade($data['modalidade']);
            $formulario->setVencimento($data['vencimento']);

        }
    
        $AlunosDAO->insertAluno($formulario);

        $response = $response->withJson([
            'status' => 'success',
            'code' => '200'
        ]);

        return $response; 
    }
    
}
<?php 

namespace App\DAO;
use App\Models\AlunosModel;
use App\DAO\IndexDAO;

class AlunosDAO extends Conexao {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getTodosAlunos(): array{
        $dados = $this->pdo
        ->query('SELECT * FROM samuifight.alunos ORDER BY nome ASC')
        ->fetchAll(\PDO::FETCH_ASSOC);

        return $dados;
    }

    public function insertAluno(AlunosModel $formulario): void {
        $statement = $this->pdo
            ->prepare(" INSERT INTO 
                            samuifight.alunos(
                                nome, 
                                idade,
                                contato,
                                horario,
                                modalidade,
                                vencimento
                            ) VALUES (
                                :nome,
                                :idade,
                                :contato,
                                :horario,
                                :modalidade,
                                :vencimento
                            );"
                    );
        $statement->execute([
            'nome' => $formulario->getNome(),
            'idade' => $formulario->getIdade(),
            'contato' => $formulario->getContato(),
            'horario' => $formulario->getHorario(),
            'modalidade' => $formulario->getModalidade(),
            'vencimento' => $formulario->getVencimento(),
        ]);
    }

    public function editAluno(AlunosModel $formulario): void {
        $statement = $this->pdo
            ->prepare(" UPDATE
                            samuifight.alunos
                        SET
                            nome = :nome,
                            idade = :idade,
                            contato = :contato,
                            horario = :horario,
                            modalidade = :modalidade,
                            vencimento = :vencimento
                        WHERE
                            id = :id;"
                    );
        $statement->execute([
            'id' => $formulario->getId(),
            'nome' => $formulario->getNome(),
            'idade' => $formulario->getIdade(),
            'contato' => $formulario->getContato(),
            'horario' => $formulario->getHorario(),
            'modalidade' => $formulario->getModalidade(),
            'vencimento' => $formulario->getVencimento()
        ]);
    }

}
<?php 

namespace App\DAO;
use App\Models\TreinoModel;
use App\DAO\IndexDAO;

class TreinoDAO extends Conexao {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getTodosTreino(): array{
        $dados = $this->pdo
        ->query('SELECT * FROM samuifight.treino ORDER BY treino ASC')
        ->fetchAll(\PDO::FETCH_ASSOC);

        return $dados;
    }

    public function insertInformacoes(TreinoModel $formulario): void {
        $statement = $this->pdo
            ->prepare(" INSERT INTO 
                            athena.formulario(
                                nome_operador, 
                                numero_cliente, 
                                cpf_cliente,
                            ) VALUES (
                                :nome_operador,
                                :numero_cliente, 
                                :cpf_cliente,
                            );"
                    );
        $statement->execute([
            'nome_operador' => $formulario->getNome_operador(),
            'numero_cliente' => $formulario->getNumero_cliente(),
            'cpf_cliente' => $formulario->getCpf_cliente(),
        ]);
    }

    public function insertMedimagemSemVagaDemaisDias(TreinoModel $formulario): void {
        $statement = $this->pdo
            ->prepare(" INSERT INTO 
                            athena.formulario(
                                nome_operador, 
                                numero_cliente, 
                                cpf_cliente, 
                            ) VALUES (
                                :nome_operador, 
                                :numero_cliente, 
                                :cpf_cliente, 
                                );"
                    );
        $statement->execute([
            'nome_operador' => $formulario->getNome_operador(),
            'numero_cliente' => $formulario->getNumero_cliente(),
            'cpf_cliente' => $formulario->getCpf_cliente(),
        ]);
    }

}
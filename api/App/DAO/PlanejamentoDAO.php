<?php 

namespace App\DAO;
use App\Models\PlanejamentoModel;

class PlanejamentoDAO extends Conexao {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getPlanejamento(): array{
        $dados = $this->pdo
        ->query('SELECT * FROM samuifight.agenda ORDER BY FIELD(dia, \'Domingo\', \'Segunda\', \'Terca\', \'Quarta\', \'Quinta\', \'Sexta\', \'Sabado\')')
        ->fetchAll(\PDO::FETCH_ASSOC);

        return $dados;
    }

    public function insertInformacoes(PlanejamentoModel $formulario): void {
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

    public function insertMedimagemSemVagaDemaisDias(PlanejamentoModel $formulario): void {
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
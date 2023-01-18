<?php 

namespace App\DAO;
use App\Models\ClientesModel;

class IndexDAO extends Conexao {

    public function __construct(){
        parent::__construct();
    }

    public function getAllDados(string $tabela): array{
        $dados = $this->pdo
        ->query('SELECT * FROM ' . $tabela)
        ->fetchAll(\PDO::FETCH_ASSOC);

        return $dados;
    }

    public function getDado(array $tabela): array{
        $statement = $this->pdo
        ->prepare('SELECT * FROM '. $tabela['tabela'] .' WHERE id = :id;');
        $statement->execute([
            'id' => $tabela['id']
        ]);
        $dado = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $dado;
    }

    public function getConvenios(array $tabela): array{
        $statement = $this->pdo
        ->prepare('SELECT * FROM '. $tabela['tabela'] .' WHERE tipo = :tipo;');
        $statement->execute([
            'tipo' => $tabela['tipo']
        ]);
        $dado = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $dado;
    }
    
    public function deleteDado(array $tabela): void {
        $statement = $this->pdo
            ->prepare('DELETE FROM '. $tabela['tabela'] .' 
                where id = :id');
        $statement->execute([
            'id' => $tabela['id']
        ]);
    }
}
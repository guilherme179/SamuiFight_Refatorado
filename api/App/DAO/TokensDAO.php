<?php 

namespace App\DAO;

use App\Models\TokensModel;
use App\Models\UsuarioModel;

class TokensDAO extends Conexao {

    public function __construct(){

        parent::__construct();

    }

    public function createToken(TokensModel $token): void{

        $statement = $this->pdo
        ->prepare('INSERT INTO tokens 
            (
            token, 
            refresh_token, 
            expired_at, 
            usuarios_id
            ) 
            VALUES 
            (
                :token, 
                :refresh_token, 
                :expired_at, 
                :usuario_id
            )');
        $statement->execute([
            'token'=> $token->getToken(),
            'refresh_token'=> $token->getRefresh_token(),
            'expired_at'=> $token->getExpired_at(),
            'usuario_id'=> $token->getUsuarios_id()
        ]);

    }

    public function verificarUsuario(UsuarioModel $usuario): array{
        
        $statement = $this->pdo->prepare(
            'SELECT  
            NOME,
            AUTO_APELIDO_GESTORES,
            FUNCAO,
            SUPERVISOR,
            COORDENADOR,
            SERVICO,
            MATRICULA,
            LOGIN_REDE  FROM n_sisfreq.sisfreq_global
            WHERE MATRICULA = :matricula AND STATUS <> "DEMITIDO" LIMIT 1 
            ;');
        $statement->execute([
            'matricula'=> $usuario->getMatricula()
        ]);
       
        $usuario = $statement->fetchAll(\PDO::FETCH_ASSOC); 
        return $usuario;
    }
}

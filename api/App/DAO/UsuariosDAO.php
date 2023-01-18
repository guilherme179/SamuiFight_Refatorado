<?php 

namespace App\DAO;
use App\Models\UsuariosModel;

class UsuariosDAO extends Conexao {

    public function __construct(){

        parent::__construct();

    }

    public function getUserByEmail(string $email): ?UsuariosModel{
        $statement = $this->pdo->prepare('SELECT id,nome,email,senha FROM usuarios WHERE email = :email');
        $statement->bindParam('email', $email);
        $statement->execute();
        $usuarios = $statement->fetchAll(\PDO::FETCH_ASSOC);
        if(count($usuarios) === 0){
            return null;
        }
        $usuario = new UsuariosModel();
        $usuario->setId($usuarios[0]['id']);
        $usuario->setNome($usuarios[0]['nome']);
        $usuario->setEmail($usuarios[0]['email']);
        $usuario->setSenha($usuarios[0]['senha']);
        return $usuario;
    }

} 
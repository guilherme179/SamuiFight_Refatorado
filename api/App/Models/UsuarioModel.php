<?php

namespace App\Models;

final class UsuarioModel {
   
    /** 
    * @var string
    */
    private $nome;
   
    /** 
    * @var string
    */
    private $login;
    
    /** 
    * @var string
    */
    private $matricula;

    /** 
    * @return string
    */
    public function getNome(): string{
        return $this->nome;
    }

    /** 
    * @return string
    */
    public function getLogin(): string{
        return $this->login;
    }

    /** 
    * @return string
    */
    public function getMatricula(): string{
        return $this->matricula;
    }

    /** 
    * @param string $nome 
    * @return string
    */
    public function setNome(string $nome): UsuarioModel{
        $this->nome = $nome;
        return $this;
    }

    /** 
    * @param string $login 
    * @return string
    */
    public function setLogin(string $login): UsuarioModel{
        $this->login = $login;
        return $this;
    }

    /**
    * @param string $matricula  
    * @return string
    */
    public function setMatricula(string $matricula): UsuarioModel{
         $this->matricula = $matricula;
         return $this;
    }

}
<?php

namespace App\Models;

final class TreinoModel {
   
    /** 
    * @var int
    */
    private $id;
    
    /** 
    * @var string
    */
    private $nome_operador;
    
    /** 
    * @var string
    */
    private $numero_cliente;
    
    /** 
    * @var string
    */
    private $cpf_cliente;

    /** 
    * @return int
    */
    public function getId(): int{
        return $this->id;
    }

    /** 
    * @return string
    */
    public function getNome_operador(): string{
        return $this->nome_operador;
    }

    /** 
    * @return string
    */
    public function getNumero_cliente(): string{
        return $this->numero_cliente;
    }

    /** 
    * @return string
    */
    public function getCpf_cliente(): string{
        return $this->cpf_cliente;
    }

    /** 
    * @param int $id
    * @return int
    */
    public function setId(int $id): TreinoModel{
        $this->id = $id;
        return $this;
    }

    /** 
    * @param string $nome_operador
    * @return string
    */
    public function setNome_operador(string $nome_operador): TreinoModel{
       $this->nome_operador = $nome_operador;
       return $this;
    }

    /** 
    * @param string $numero_cliente
    * @return string
    */
    public function setNumero_cliente(string $numero_cliente): TreinoModel{
       $this->numero_cliente = $numero_cliente;
       return $this;
    }

    /** 
    * @param string $cpf_cliente
    * @return string
    */
    public function setCpf_cliente(string $cpf_cliente): TreinoModel{
       $this->cpf_cliente = $cpf_cliente;
       return $this;
    }
}
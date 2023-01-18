<?php

namespace App\Models;

final class AlunosModel {
   
    /** 
    * @var int
    */
    private $id;
    
    /** 
    * @var string
    */
    private $nome;
    
    /** 
    * @var string
    */
    private $idade;
    
    /** 
    * @var string
    */
    private $contato;
    
    /** 
    * @var string
    */
    private $horario;
    
    /** 
    * @var string
    */
    private $modalidade;
    
    /** 
    * @var string
    */
    private $vencimento;

    /** 
    * @return int
    */
    public function getId(): int{
        return $this->id;
    }

    /** 
    * @return string
    */
    public function getNome(): string{
        return $this->nome;
    }

    /** 
    * @return string
    */
    public function getIdade(): string{
        return $this->idade;
    }

    /** 
    * @return string
    */
    public function getContato(): string{
        return $this->contato;
    }

    /** 
    * @return string
    */
    public function getHorario(): string{
        return $this->horario;
    }

    /** 
    * @return string
    */
    public function getModalidade(): string{
        return $this->modalidade;
    }

    /** 
    * @return string
    */
    public function getVencimento(): string{
        return $this->vencimento;
    }

    /** 
    * @param int $id
    * @return int
    */
    public function setId(int $id): AlunosModel{
        $this->id = $id;
        return $this;
    }

    /** 
    * @param string $nome
    * @return string
    */
    public function setNome(string $nome): AlunosModel{
       $this->nome = $nome;
       return $this;
    }

    /** 
    * @param string $idade
    * @return string
    */
    public function setIdade(string $idade): AlunosModel{
       $this->idade = $idade;
       return $this;
    }

    /** 
    * @param string $contato
    * @return string
    */
    public function setContato(string $contato): AlunosModel{
       $this->contato = $contato;
       return $this;
    }

    /** 
    * @param string $horario
    * @return string
    */
    public function setHorario(string $horario): AlunosModel{
       $this->horario = $horario;
       return $this;
    }

    /** 
    * @param string $modalidade
    * @return string
    */
    public function setModalidade(string $modalidade): AlunosModel{
       $this->modalidade = $modalidade;
       return $this;
    }

    /** 
    * @param string $vencimento
    * @return string
    */
    public function setVencimento(string $vencimento): AlunosModel{
       $this->vencimento = $vencimento;
       return $this;
    }
}
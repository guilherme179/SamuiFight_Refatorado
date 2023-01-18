<?php

namespace App\Models;

final class TokensModel {
   
    /** 
    * @var int
    */
    private $id;
    
    /** 
    * @var string
    */
    private $token;
    
    /** 
    * @var string
    */
    private $refresh_token;
    
    /** 
    * @var string
    */
    private $expired_at;
    
    /** 
    * @var int
    */
    private $usuarios_id;

    /** 
    * @return int
    */
    public function getId(): int{
        return $this->id;
    }

    /** 
    * @return string
    */
    public function getToken(): string{
        return $this->token;
    }

    /** 
    * @return string
    */
    public function getRefresh_token(): string{
        return $this->refresh_token;
    }

    /** 
    * @return string
    */
    public function getExpired_at(): string{
        return $this->expired_at;
    }

    /** 
    * @return int
    */
    public function getUsuarios_id(): int{
        return $this->usuarios_id;
    }

    /** 
    * @param int $id
    * @return int
    */
    public function setId(int $id): TokensModel{
        $this->id = $id;
        return $this;
    }

    /** 
    * @param string $token
    * @return string
    */
    public function setToken(string $token): TokensModel{
       $this->token = $token;
       return $this;
    }

    /** 
    * @param string $refresh_token 
    * @return string
    */
    public function setRefresh_token(string $refresh_token): TokensModel{
        $this->refresh_token = $refresh_token;
        return $this;
    }

    /**
    * @param string $expi  
    * @return string
    */
    public function setExpired_at(string $expired_at): TokensModel{
         $this->expired_at = $expired_at;
         return $this;
    }

    /**
    * @param int $expi  
    * @return int
    */
    public function setUsuarios_id(int $usuarios_id): TokensModel{
        $this->usuarios_id = $usuarios_id;
        return $this;
    }
}
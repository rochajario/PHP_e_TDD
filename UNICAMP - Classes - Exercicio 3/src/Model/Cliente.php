<?php

namespace Unicamp\Lista1Exercicio3\Model;

class Cliente
{
    private $nome;
    
    public function __construct($nome)
    {
        $this->nome = $nome;
    }
    public function getNome():string 
    {
        return $this->nome;
    }
}
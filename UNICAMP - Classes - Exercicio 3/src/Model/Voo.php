<?php
namespace Unicamp\Lista1Exercicio3\Model;

class Voo 
{
    private const QUANTIDADE_ASSENTOS = 100;
    private $assentos;
    private $numeroVoo;
    private $data;

    public function __construct($numeroVoo,$data)
    {
        $this->assentos = [];
        $this->numeroVoo = $numeroVoo;
        $this->data = $data;
    }
    public function getVoo():int 
    {
        return $this->numeroVoo;
    }
    public function getData():string 
    {
        return $this->data;
    }
    
    public function proximoLivre():int
    {
        for ($i=0; $i < self::QUANTIDADE_ASSENTOS; $i++) {
            if(empty($this->assentos[$i])){
                $index = $i+1;
                return $index;
            }
        }
    }

    public function ocupa($index, Cliente $cliente):bool 
    {
        $key = $index-1;
        if(!empty($this->assentos[$key])){
            return false;
        }

        $this->assentos[$key] = $cliente;
        return true;
    }

    //verifica se o número da cadeira recebido como parâmetro está ocupada
    public function verifica($index):bool 
    {
        $key = $index-1;
        if(!empty($this->assentos[$key])){
            return true;
        }
        return false;
    }
    public function vagas():int
    {
        $quantidadeDisponivel = 0;
        for ($i=0; $i < self::QUANTIDADE_ASSENTOS; $i++) {
            if(empty($this->assentos[$i])){
                $quantidadeDisponivel++;
            }
        }
        return $quantidadeDisponivel;
    }
}
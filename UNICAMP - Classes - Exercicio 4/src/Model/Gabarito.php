<?php
namespace Unicamp\Lista1Exercicio4\Model;
class Gabarito 
{
    private $respostas;

    public function __construct()
    {
        $this->respostas = array();
    }
    
    public function addQuestion($titulo, $opcaoCorreta){
        $id = count($this->respostas)+1;
        $questao = new RespostaGabarito($id,$titulo,$opcaoCorreta);
        $this->respostas[] = $questao;
    }
    
    public function getQuestion($id)
    {
        foreach($this->respostas as $resposta){
            if($resposta->getId() == $id){
                return $resposta;
            }
        }
    }

    public function getAllQuestions()
    {
        return $this->respostas;
    }

    public function showAllQuestions():string
    {
        $screen = "";
        foreach($this->respostas as $resposta){
            $screen = $screen.$resposta->getId().") ".$resposta->getTitulo().".".PHP_EOL;
        }
        return $screen;
    }
}
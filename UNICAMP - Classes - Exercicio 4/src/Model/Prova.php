<?php
namespace Unicamp\Lista1Exercicio4\Model;
class Prova
{
    private $nomeAluno;
    private $perguntas;
    
    public function __construct($nomeAluno,Gabarito $gabarito)
    {
        $this->nomeAluno = $nomeAluno;
        $this->perguntas = array("id","titulo","resposta");

        foreach ($gabarito->getRepostas() as $resposta){
            $this->perguntas['id'] = $resposta['id'];
            $this->perguntas["titulo"] = $resposta['resposta']->getTitulo();
        }
    }



}
<?php
namespace Unicamp\Lista1Exercicio4\Model;

class RespostaGabarito
{
    private $id;
    private $titulo;
    private $opcoes;

    public function getId():int 
    {
        return $this->id;
    }
    public function getTitulo():string
    {
        return $this->titulo;
    }
    public function getResposta():string 
    {
        $i = 'a';
        while(true){
            if($this->opcoes[$i]==true){
                return $i;
            }
            $i++;
        } 
    }

    public function __construct($id,$titulo, $opcaoMarcada)
    {
        $this->id = $id;
        $this->titulo =$titulo;
        $this->opcoes = array('a'=>false,'b'=>false,'c'=>false,'d'=>false,'e'=>false);

        if($this->identificaSeOpcaoEValida($opcaoMarcada)==true){
            $this->atribuiOpcao($opcaoMarcada);
        }
    }

    private function atribuiOpcao($opcaoMarcada)
    {
        $this->opcoes[$opcaoMarcada] = true;
    }

    private function identificaSeOpcaoEValida($opcaoMarcada)
    {
        $condicao = ($opcaoMarcada >='a' and $opcaoMarcada <= 'e' and is_string($opcaoMarcada));
        if($condicao === false){
            throw new \DomainException("Valor informado inválido");
        }
        return true;
    }
}
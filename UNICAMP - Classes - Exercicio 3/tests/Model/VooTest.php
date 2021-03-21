<?php

namespace Unicamp\Lista1Exercicio3\Tests;
use Unicamp\Lista1Exercicio3\Model\Voo;
use Unicamp\Lista1Exercicio3\Model\Cliente;
use PHPUnit\Framework\TestCase;

class vooTest extends TestCase
{
    private $voo;

    public function setUp():void 
    {
        $this->voo = new Voo(1234,"18/05/1993");
    }
    public function testValidaObjeto()
    {
        self::assertEquals(true,is_object($this->voo));
        self::assertEquals(1234,$this->voo->getVoo());
        self::assertEquals("18/05/1993",$this->voo->getData());
    }
    public function testValidaProximoAssentoLivre()
    {
        self::assertEquals(1,$this->voo->proximoLivre());
    }
    public function testValidaOcupacaoDeAssento()
    {
        self::assertEquals(true,$this->voo->ocupa(1, new Cliente('Fulano de Tal')));
        self::assertEquals(true,$this->voo->verifica(1));
        self::assertEquals(false,$this->voo->verifica(2));

    }
    public function testDeveriaValidarQuantidadeDeVagasDisponiveis()
    {
        $this->voo->ocupa(1, new Cliente("Fulano de Tal"));
        self::assertEquals(99,$this->voo->vagas());
    }
}
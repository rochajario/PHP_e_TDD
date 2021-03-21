<?php

namespace Unicamp\Lista1Exercicio3\Tests;
use Unicamp\Lista1Exercicio3\Model\Cliente;
use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
    private $cliente;

    public function setUp():void 
    {
        $this->cliente = new Cliente("Fulano de Tal");
    }

    public function testVerificaCliente()
    {
        self::assertEquals(true, is_object($this->cliente));
        self::assertEquals("Fulano de Tal",$this->cliente->getNome());
    }
}
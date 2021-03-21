<?php
namespace Unicamp\Lista1Exercicio4\Tests;
use Unicamp\Lista1Exercicio4\Model\RespostaGabarito as Questao;
use PHPUnit\Framework\TestCase;

class QuestaoGabaritoTest extends TestCase
{

    public function dataSet()
    {
        $pergunta1 = new Questao(1,"Pergunta 1",'a');
        $pergunta2 = new Questao(2,"Pergunta 2",'b');
        $pergunta3 = new Questao(3,"Pergunta 3",'c');
        $pergunta4 = new Questao(4,"Pergunta 4",'d');
        $pergunta5 = new Questao(5,"Pergunta 5",'e');

        return [
            "Pergunta 1"=>[$pergunta1],
            "Pergunta 2"=>[$pergunta2],
            "Pergunta 3"=>[$pergunta3],
            "Pergunta 4"=>[$pergunta4],
            "Pergunta 5"=>[$pergunta5]
        ];
    }

    /**
     * @dataProvider dataSet
     */
    public function testDeveriaRetornarRespostasMarcadas(Questao $pergunta)
    {
        switch($pergunta->getTitulo()){
            case "Pergunta 1":
                self::assertEquals('a', $pergunta->getResposta());
                break;
            case "Pergunta 2":
                self::assertEquals('b', $pergunta->getResposta());
                break;
            case "Pergunta 3":
                self::assertEquals('c', $pergunta->getResposta());
                break;
            case "Pergunta 4":
                self::assertEquals('d', $pergunta->getResposta());
                break;
            case "Pergunta 5":
                self::assertEquals('e', $pergunta->getResposta());
                break;
        }
    }

    /**
     * @dataProvider dataSet
     */
    public function testValidaEntradasDeRespostas(Questao $pergunta)
    {
        switch($pergunta->getTitulo()){
            case "Pergunta 1":
                self::assertEquals(true, is_object($pergunta));
                break;
            case "Pergunta 2":
                self::assertEquals(true, is_object($pergunta));
                break;
            case "Pergunta 3":
                self::assertEquals(true, is_object($pergunta));
                break;
            case "Pergunta 4":
                self::assertEquals(true, is_object($pergunta));
                break;
            case "Pergunta 5":
                self::assertEquals(true, is_object($pergunta));
                break;
        }
    }

    public function testDeveriaReceberExcessaoEmEntradaComNumeros()
    {
        self::expectException(\DomainException::class);
        self::expectExceptionMessage("Valor informado inválido");
        $pergunta5 = new Questao(5,"Pergunta 5",'f');
    }
    public function testDeveriaReceberExcessaoEmEntradaComCaracteresForaDoRange()
    {
        self::expectException(\DomainException::class);
        self::expectExceptionMessage("Valor informado inválido");
        $pergunta5 = new Questao(5,"Pergunta 5",0);
    }
}
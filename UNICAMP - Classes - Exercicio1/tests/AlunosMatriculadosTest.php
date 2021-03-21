<?php

/*  
    Escreva uma classe cujos objetos representam alunos matriculados em uma disciplina. 
    Cada objeto dessa classe deve guardar os seguintes dados do aluno: matrícula, nome, 
    2 notas de prova e 1 nota detrabalho. 
    
    Escreva os seguintes métodos para esta classe:
    "media()" -> calcula a média final do aluno (cada prova tem peso 2,5 e o trabalho tem peso 2)

    Test Scenario 1 = Valores de Entrada entre 0 e 10;
    Test Scenario 2 = Vetor "$provas" só pode conter 2 keys;
    Test Scenario 3 = (7*2,5) + (8*2,5) + (10 *2) / 7 = 8,21;
    Test Scenario 4 = (10*2,5) + (10*2,5) + (10 *2) / 7 = 10;

    "final()" ->calcula quanto o aluno precisa para a prova final 
    (retorna zero se ele não for para a final)
*/

namespace Unicamp\Lista1Exercicio1\Tests;

use Unicamp\Lista1Exercicio1\Aluno;
use PHPUnit\Framework\TestCase;

class AlunosMatriculadosTest extends TestCase
{   
    //Data Provider de Alunos com diferentes Notas 
    public function alunosComNotasDiversas() 
    {
        $alunoA = new Aluno('1234','Jario');
        $alunoA->adicionaNotaProva(7);
        $alunoA->adicionaNotaProva(8);
        $alunoA->adicionaNotaTrabalho(10);

        $alunoB = new Aluno('4321','Jario');
        $alunoB->adicionaNotaProva(10);
        $alunoB->adicionaNotaProva(10);
        $alunoB->adicionaNotaTrabalho(10);

        return [
            "Aluno Com notas 7,8,10"=>[$alunoA],
            "Aluno Com notas 10,10,10"=>[$alunoB]
        ];
    }

    //Data Provider de Aluno Padrão
    public function alunoPadrao() 
    {
        $alunoA = new Aluno('1234','Jario');
        $alunoA->adicionaNotaProva(7);
        $alunoA->adicionaNotaProva(8);
        $alunoA->adicionaNotaTrabalho(10);

        return [
            "Aluno Com notas 7,8,10"=>[$alunoA],
        ];
    }

    /**
     * @dataProvider alunoPadrao
     */
    public function testValidaAtributosDoAluno(Aluno $aluno)
    {
        self::assertEquals('1234',$aluno->getMatricula());
        self::assertEquals('Jario',$aluno->getNome());
        self::assertEquals(true,is_array($aluno->getProvas()));
        self::assertCount(2,$aluno->getProvas());
        self::assertEquals("7",$aluno->getProvas()[0]);
        self::assertEquals("8",$aluno->getProvas()[1]);
        self::assertEquals("10",$aluno->getTrabalho());
    }

    /**
     * @dataProvider alunosComNotasDiversas
     */
    public function testValidaCalculoDeMedia(Aluno $aluno)
    {
        switch($aluno->getMatricula()){
            case '1234':
                self::assertEquals("8,21",$aluno->media());
                break;
            case '4321':
                self::assertEquals("10,00",$aluno->media());
                break;
        }
    }

    public function testDeveriaIdentificarExcecaoDeNotasInvalidas()
    {
        self::expectException(\DomainException::class);
        self::expectExceptionMessage("Valor Inválido");
        $aluno = new Aluno('2314','Jario');
        $aluno->adicionaNotaProva(-1);
        $aluno->adicionaNotaProva(0);
        $aluno->adicionaNotaTrabalho(11);
    }
}
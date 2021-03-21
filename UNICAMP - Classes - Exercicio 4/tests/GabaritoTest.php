<?php
namespace Unicamp\Lista1Exercicio4\Tests;
use Unicamp\Lista1Exercicio4\Model\Gabarito;
use Unicamp\Lista1Exercicio4\Model\RespostaGabarito as Resposta;
use PHPUnit\Framework\TestCase;

class GabaritoTest extends TestCase
{
    private $gabarito;

    public function testDeveriaObterOTituloDasRespostas()
    {
        $this->gabarito = new Gabarito();
        $this->gabarito->addQuestion("Pergunta nº 1", 'a');

        self::assertEquals("Pergunta nº 1",$this->gabarito->getQuestion(1)->getTitulo());
        self::assertEquals("a",$this->gabarito->getQuestion(1)->getResposta());
    }

    public function testDeveriaValidarASaidaDeTodasAsPerguntasAdicionadas()
    {
        $this->gabarito = new Gabarito();
        $this->gabarito->addQuestion("Pergunta nº 1", 'a');
        $this->gabarito->addQuestion("Pergunta nº 2", 'b');

        self::assertEquals("1) Pergunta nº 1.\r\n2) Pergunta nº 2.\r\n",$this->gabarito->showAllQuestions());
    }
}


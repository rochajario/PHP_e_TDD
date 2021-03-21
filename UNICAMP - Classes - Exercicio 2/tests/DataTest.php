<?php
/*
Escreva uma classe Data cuja instância (objeto) represente uma data. 

Esta classe deverá dispor dos seguintes métodos:

construtor() -> define a data de determinado objeto (através de parâmetro), 
este método verifica se a data está correta, caso não esteja a data é configurada como 01/01/0001

compara() -> recebe como parâmetro um outro objeto da Classe data, compare com a data corrente e retorne:
"0" se as datas forem iguais;
"1" se a data corrente for maior que a do parâmetro;
"1" se a data do parâmetro for maior que a corrente.

getDia() -> retorna o dia da data;
getMes() -> retorna o mês da data;
getMesExtenso() -> retorna o mês da data corrente por extenso;
getAno() -> retorna o ano da data;
isBissexto() -> retorna verdadeiro se o ano da data corrente for bissexto e falso caso contrário;
clone() -> o objeto clona a si próprio, para isto, ele cria um novo objeto da classe;

Data com os mesmos valores de atributos e retorna sua referência pelo método
*/

namespace Unicamp\Lista1Exercicio2\Tests;
use PHPUnit\Framework\TestCase;
use Unicamp\Lista1Exercicio2\Data;

class DataTest extends TestCase
{
    //Data Providers
    public function anoBissexto(){
        $dataA = new Data(29,2,2024);

        return [
            "Dia 29 de Fevereiro"=>[$dataA]
        ];
    }
    public function dataInvalida(){
        $dataA = new Data(32,1,2024);

        return [
            "Dia 32 de Janeiro"=>[$dataA]
        ];
    }
    public function datasValidas(){
        $dataA = new Data(30,4,2010);
        $dataB = new Data(31,3,2010);
        $dataC = new Data(29,2,2024);
        return [
            "Dia 30 de Abril"=>[$dataA],
            "Dia 31 de Março"=>[$dataB],
            "Dia 29 de Fevereiro"=>[$dataC]
        ];
    }

    /**
     * @dataProvider datasValidas
     */
    public function testDeveriaVerificarSeOAnoEBissexto(Data $data)
    {
        switch ($data->getDia()){
            case 30:
                //Meses com 30 dias
                self::assertEquals(false,$data->isBissexto());
                break;
            case 31:
                //Meses com 31 dias
                self::assertEquals(false,$data->isBissexto());
                break;
            case 29:
                //Ano Bissexto
                self::assertEquals(true,$data->isBissexto());
                break;
        }
    }

    /**
     * @dataProvider datasValidas
     */
    public function testDeveriaValidarParametros(Data $data)
    {
        switch ($data->getDia()){
            case 30:
                //Meses com 30 dias
                self::assertEquals(30,$data->getDia());
                self::assertEquals(4,$data->getMes());
                self::assertEquals(2010,$data->getAno());
                break;
            case 31:
                //Meses com 31 dias
                self::assertEquals(31,$data->getDia());
                self::assertEquals(3,$data->getMes());
                self::assertEquals(2010,$data->getAno());
                break;
            case 29:
                //Ano Bissexto
                self::assertEquals(29,$data->getDia());
                self::assertEquals(2,$data->getMes());
                self::assertEquals(2024,$data->getAno());
                break;
            case 32:
                //Caso inválido
                self::assertEquals(1,$data->getDia());
                self::assertEquals(1,$data->getMes());
                self::assertEquals(1,$data->getAno());
                break;
        }
    }

    /**
     * @dataProvider anoBissexto
     */
    public function testDeveriaRetornarMesPorExtenso($data)
    {
        self::assertEquals('Fevereiro',$data->getMesPorExtenso());
    }

}

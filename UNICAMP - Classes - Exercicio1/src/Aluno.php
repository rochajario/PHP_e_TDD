<?php

namespace Unicamp\Lista1Exercicio1;

class Aluno
{
    /** @var string */
    private $matricula;

    /** @var string */
    private $nome;

    /** @var float[] */
    private $provas;

    /** @var float */
    private $trabalho;

    public function __construct($matricula, $nome)
    {
        $this->matricula = $matricula;
        $this->nome = $nome;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getMatricula(): string
    {
        return $this->matricula;
    }
    public function getProvas(): array
    {
        return $this->provas;
    }
    public function getTrabalho(): float
    {
        return $this->trabalho;
    }

    public function adicionaNotaProva($nota): void
    {
        $this->validaNota($nota);
        $this->provas[] = $nota;
    }
    public function adicionaNotaTrabalho($nota): void
    {
        $this->validaNota($nota);
        $this->trabalho = $nota;
    }
    public function media(): string
    {
        $pesoProva = 2.5;
        $pesoTrabalho = 2;
        $media = $this->calcularMedia($pesoProva, $pesoTrabalho);
        return number_format($media, 2, ",", ".");
    }

    private function calcularMedia($pesoProva, $pesoTrabalho): float
    {
        $qtdProvas = count($this->getProvas());
        $divisor = ($pesoProva * $qtdProvas) + $pesoTrabalho;
        $notaTrabalhoPesada = $this->getTrabalho() * $pesoTrabalho;

        //Varre Vetor e armazena em acumulador o valor pesado das notas em provas
        $notaProvasPesadas = 0;
        foreach ($this->getProvas() as $prova) {
            $notaProvasPesadas = $notaProvasPesadas + ($prova * $pesoProva);
        }

        return ($notaProvasPesadas + $notaTrabalhoPesada) / $divisor;
    }

    private function validaNota($nota): void
    {
        if (($nota < 0) || ($nota > 10)) {
            throw new \DomainException('Valor Inválido');
        }
    }
}

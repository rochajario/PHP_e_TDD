<?php

namespace Unicamp\Lista1Exercicio2;
use Unicamp\Lista1Exercicio2\DataConstantes;

class Data
{
    private $dia;
    private $mes;
    private $ano;
    private $bissexto;

    public function __construct($dia, $mes, $ano)
    {
        $this->validaAnoBissexto($ano);
        
        if (in_array($mes, DataConstantes::TRINTA_E_UM_DIAS)) {
            $this->validaMesTrintaEUmDias($dia, $mes, $ano);
            return;
        }

        if (in_array($mes, DataConstantes::TRINTA_DIAS)) {
            $this->validaMesTrintaDias($dia, $mes, $ano);
            return;
        }

        if (in_array($mes, DataConstantes::VINTE_E_OITO_DIAS)) {
            $this->validaMesVinteEOitoDias($dia, $mes, $ano);
            return;
        }
    }

    private function validaAnoBissexto($ano):void 
    {
        $calculo = ($ano%4==0 && $ano%100!=0);
        if($calculo){
            $this->bissexto = true;
            return;
        }
        $this->bissexto = false;
    }

    private function validaMesTrintaEUmDias($dia, $mes, $ano): void
    {
        if ($dia < 0 || $dia > 31) {
            $this->valoresInvalidos();
            return;
        }
        $this->valoresValidos($dia, $mes, $ano);
    }

    private function validaMesTrintaDias($dia, $mes, $ano): void
    {
        if ($dia < 0 || $dia > 30) {
            $this->valoresInvalidos();
            return;
        }
        $this->valoresValidos($dia, $mes, $ano);
    }

    private function validaMesVinteEOitoDias($dia, $mes, $ano):void 
    {
        if ((in_array($mes,DataConstantes::VINTE_E_OITO_DIAS)) && ($this->isBissexto())){
            if ($dia < 0 || $dia > 29) {
                $this->valoresInvalidos();
                return;
            }
        }
        
        if ((in_array($mes,DataConstantes::VINTE_E_OITO_DIAS)) && (!$this->isBissexto())){
            if ($dia < 0 || $dia > 28) {
                $this->valoresInvalidos();
                return;
            }
        }
        $this->valoresValidos($dia, $mes, $ano);
    }

    private function valoresInvalidos(): void
    {
        $this->dia = 1;
        $this->mes = 1;
        $this->ano = 1;
    }
    private function valoresValidos($dia, $mes, $ano): void
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->ano = $ano;
    }

    public function getMesPorExtenso():string 
    {
        return DataConstantes::NOMES_POR_MES[$this->getMes()];
    }
    public function getMes(): int
    {
        return $this->mes;
    }
    public function getDia(): int
    {
        return $this->dia;
    }
    public function getAno(): int
    {
        return $this->ano;
    }
    public function isBissexto(): bool
    {
        return $this->bissexto;
    }
}

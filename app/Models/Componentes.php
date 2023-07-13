<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    use HasFactory;

    public function format_mascara_dinheiro_decimal($valorParaFormatar)
    {       
        $tamanho = strlen($valorParaFormatar);
        $dados = str_replace(',', '.', $valorParaFormatar);
        if($tamanho <= 6) {
            $dados = str_replace(',', '.', $valorParaFormatar);
           
        }elseif($tamanho >= 7 && $tamanho <= 10) {
            
            $decimal = explode(',', $valorParaFormatar);
            $retirarVirgulaSubstPorPonto = str_replace(',', '.', $valorParaFormatar);;
            $separarPorIndice = explode('.', $retirarVirgulaSubstPorPonto);
            $dados = floatval($separarPorIndice[0] . $separarPorIndice[1].".".$decimal[1]);
            
        }elseif ($tamanho >= 11) {
            $number = explode(',', $valorParaFormatar);
            $inteiro =  str_replace(".", "", $number[0]);
            $decimal = $number[1];
            $dados = floatval($inteiro.'.'.$decimal);
           

        }

        return $dados;
        
    }
}

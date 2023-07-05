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

        }elseif($tamanho >= 8 && $tamanho <= 10) {

            $retirarVirgulaSubstPorPonto = str_replace(',', '.', $valorParaFormatar);;
            $separarPorIndice = explode('.', $retirarVirgulaSubstPorPonto);
            $dados = $separarPorIndice[0] . $separarPorIndice[1];
        }

        return $dados;
        
    }
}

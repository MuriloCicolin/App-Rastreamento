<?php

namespace App;
use App\Models\Frete;
use Illuminate\Support\Str;

class Helpers
{
    static public function gerarCodigoRastreioUnico() {
        do {
            $codigo = Str::upper(Str::random(8));

            $existeFreteCodigo = Frete::where('codigo_rastreio', $codigo)->exists();
        } while ($existeFreteCodigo);
         return $codigo;
    }
}


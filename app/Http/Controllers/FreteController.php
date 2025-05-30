<?php

namespace App\Http\Controllers;

use App\Enums\FreteStatus;
use App\Helpers;
use App\Http\Requests\StoreFreteRequest;
use Illuminate\Http\Request;
use App\Models\Frete;

class FreteController extends Controller
{
    public function store(StoreFreteRequest $request): Frete
    {
        $dados = $request->all();
        $dados['codigo_rastreio'] = Helpers::gerarCodigoRastreioUnico();
        $dados['status'] = FreteStatus::EM_TRANSITO;

        $frete = Frete::create($dados);

        return $frete;

    }
}

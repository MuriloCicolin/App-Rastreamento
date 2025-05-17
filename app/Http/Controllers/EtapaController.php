<?php

namespace App\Http\Controllers;

use App\Enums\FreteStatus;
use App\Http\Requests\StoreEtapaRequest;
use App\Models\Frete;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Etapa;

class EtapaController extends Controller
{
    public function store(StoreEtapaRequest $request): JsonResponse | Etapa
    {
        $frete = Frete::find($request->frete_id);

        if($frete->status == FreteStatus::ENTREGUE) {
            return response()->json([
                'message' => 'Não é possível adicionar etapas a um frente que já foi Entregue'
            ], 400);
        }

        $dados = $request->all();
        $etapas = Etapa::create($dados);

        $tipoFreteStatus = FreteStatus::fromName($request->tipo_etapa);

        $frete->update([
            "status" => $tipoFreteStatus,
        ]);

        return $etapas;
    }
}

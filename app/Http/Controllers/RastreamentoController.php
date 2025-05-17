<?php

namespace App\Http\Controllers;

use App\Models\Frete;
use Illuminate\Http\Request;

class RastreamentoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $codigo_rastreio = $request->input('codigo_rastreio', '');


        $fretes = Frete::where('codigo_rastreio', $codigo_rastreio)
            ->with('etapas')
            ->first();

        if(!$fretes) {
            return redirect()->back()->with('error', 'Frete não encontrado!');
        }

        return view('frete.rastreamento', [
            'fretes' => $fretes,
        ]);
    }
}

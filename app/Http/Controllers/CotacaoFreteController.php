<?php

namespace App\Http\Controllers;

use App\CotacaoFrete as CotacaoFrete;
use App\Http\Resources\CotacaoFreteResource as CotacaoFreteResource;
use App\Http\Resources\CotacaoFreteMelhoresResource as CotacaoFreteMelhoresResource;
use App\Http\Resources\UfResource as UfResource;
use App\Http\Requests\CotacaoFreteRequest;
use App\Repositories\CotacaoFreteRepositoryInterface as CotacaoFreteRepositoryInterface;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class CotacaoFreteController extends BaseController
{
    private $cotacaoFreteRepository;
  
    public function __construct(CotacaoFreteRepositoryInterface $cotacaoFreteRepository)
    {
        $this->cotacaoFreteRepository = $cotacaoFreteRepository;
    }

    public function index()
    {
        $cotacoes = $this->cotacaoFreteRepository->all();
        return $this->sendResponse(CotacaoFreteResource::collection($cotacoes), 'Cotações carregadas com sucesso.');
    }

    public function store(CotacaoFreteRequest $request)
    {
        $cotacao = $this->cotacaoFreteRepository->create([
            'uf' => $request->uf,
            'percentual_cotacao' => $request->percentual_cotacao,
            'valor_extra' => $request->valor_extra,
            'transportadora_id' => $request->transportadora_id,
        ]);

        if ($cotacao)
            return $this->sendResponse(new CotacaoFreteResource($cotacao), 'Cotação feita com sucesso.');
        return $this->sendError('Erro. Problema ao salvar os dados.');
    }

    public function calcularImposto(Request $request)
    {
        $input = $request->all();
        $cotacoes = $this->cotacaoFreteRepository->calcularImposto($input['uf'], (float)$input['valor_pedido']);

        if (count($cotacoes) > 0)
            return $this->sendResponse(CotacaoFreteMelhoresResource::collection($cotacoes), 'Cotações carregadas com sucesso.');
        else
            return $this->sendError('Cotação não cadastrada o UF.');

        return $this->sendError('Erro. Problema ao carregar as cotações.');
    }

    public function listUF() 
    {
        $ufs = $this->cotacaoFreteRepository->listUF();
        return $this->sendResponse(UfResource::collection($ufs), 'UFs carregadas com sucesso.');
    }
}

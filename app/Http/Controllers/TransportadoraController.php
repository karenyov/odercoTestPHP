<?php

namespace App\Http\Controllers;

use App\Transportadora as Transportadora;
use App\Http\Resources\TransportadoraResource as TransportadoraResource;
use App\Http\Controllers\BaseController;
use App\Http\Requests\TransportadoraRequest;
use App\Repositories\TransportadoraRepositoryInterface as TransportadoraRepositoryInterface;
use Illuminate\Http\Request;

class TransportadoraController extends BaseController
{
    private $transportadoraRepository;
  
    public function __construct(TransportadoraRepositoryInterface $transportadoraRepository)
    {
        $this->transportadoraRepository = $transportadoraRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportadoras = $this->transportadoraRepository->all();

        return $this->sendResponse(TransportadoraResource::collection($transportadoras), 'Transportadoras carregadas com sucesso.');
    }
}

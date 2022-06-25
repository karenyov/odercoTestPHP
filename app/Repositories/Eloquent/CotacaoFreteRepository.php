<?php

namespace App\Repositories\Eloquent;

use DB;
use App\CotacaoFrete;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\CotacaoFreteRepositoryInterface;
use Illuminate\Support\Collection;

class CotacaoFreteRepository extends BaseRepository implements CotacaoFreteRepositoryInterface
{

   /**
    * CotacaoFreteRepository constructor.
    *
    * @param CotacaoFrete $model
    */
    public function __construct(CotacaoFrete $model)
    {
       parent::__construct($model);
    }

   /**
    * @return Collection
    */
    public function all(): Collection
    {
       return $this->model->all();    
    }

    public function findByUf($uf)
    {
        return CotacaoFrete::where('uf', $uf)->first();
    }

    public function calcularImposto($uf, $valor_pedido): Collection
    {
        return DB::table('cotacao_frete')
            ->where('uf', $uf)
            ->orderBy(DB::raw("((($valor_pedido / 100) * percentual_cotacao) + valor_extra)"), 'ASC')
            ->limit(3)
            ->get();
    }

    public function listUF(): Collection
    {
        return CotacaoFrete::select('uf')->groupBy('uf')->get();
    }
}
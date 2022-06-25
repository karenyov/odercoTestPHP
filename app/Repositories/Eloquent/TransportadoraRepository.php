<?php

namespace App\Repositories\Eloquent;

use App\Transportadora;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\TransportadoraRepositoryInterface;
use Illuminate\Support\Collection;

class TransportadoraRepository extends BaseRepository implements TransportadoraRepositoryInterface
{

   /**
    * TransportadoraRepository constructor.
    *
    * @param Transportadora $model
    */
   public function __construct(Transportadora $model)
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
}
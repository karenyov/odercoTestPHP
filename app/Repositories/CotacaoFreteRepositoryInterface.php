<?php
namespace App\Repositories;

use App\CotacaoFrete;
use Illuminate\Support\Collection;

interface CotacaoFreteRepositoryInterface
{
   public function all(): Collection;

   public function findByUf($uf);

   public function calcularImposto($uf, $valor_pedido) : Collection;

   public function listUF(): Collection;
}
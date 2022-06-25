<?php
namespace App\Repositories;

use App\Transportadora;
use Illuminate\Support\Collection;

interface TransportadoraRepositoryInterface
{
   public function all(): Collection;
}
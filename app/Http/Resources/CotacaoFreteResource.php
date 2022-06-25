<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CotacaoFreteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uf' => $this->uf,
            'transportadora_id' => $this->transportadora_id,
            'percentual_cotacao' => $this->percentual_cotacao,
            'valor_extra' => $this->valor_extra,
        ];
    }
}

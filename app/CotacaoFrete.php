<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CotacaoFrete extends Model
{
    public $timestamps = true;

    protected $table = 'cotacao_frete';
    protected $with = ['transportadora'];

    protected $guarded = [];
    protected $fillable = ['uf', 'percentual_cotacao', 'valor_extra', 'transportadora_id'];

    /**
     * Get the Transportadora that owns the CotacaoFrete
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transportadora(): BelongsTo
    {
        return $this->belongsTo(Transportadora::class, 'transportadora_id', 'id');
    }
}

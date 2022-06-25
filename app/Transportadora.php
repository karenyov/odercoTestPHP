<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    public $timestamps = true;

    protected $table = 'transportadora';

    protected $guarded = [];
    protected $fillable = ['nome'];

    /**
     * Get all of the Cotação Frete for the Transportadora
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cotacaoFrete(): HasMany
    {
        return $this->hasMany(CotacaoFrete::class);
    }
}

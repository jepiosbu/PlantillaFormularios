<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table='categorias';
    public function formulario()
    {
        return $this->belongsTo(formulario::class);
    }
}

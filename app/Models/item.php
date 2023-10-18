<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function cateforia()
    {
        return $this->belongsTo(categoria::class);
    }
    public function item_type()
    {
        return $this->belongsTo(item_type::class);
    }
}

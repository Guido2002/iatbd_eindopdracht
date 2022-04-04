<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function kindModel() {
        return $this->belongsTo('\App\Models\KindOfItem', "kind", "kind");
    }
}

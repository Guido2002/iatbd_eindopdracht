<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KindOfItem extends Model
{
    protected $table = "kind_of_item";

    public function allMovie() {
        return $this->hasMany('\App\Models\Item', "kind", "kind");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado_tramite extends Model
{
    use HasFactory;

    public function message(){
        return $this->hasMany(Estado_tramite::class);
    }


}

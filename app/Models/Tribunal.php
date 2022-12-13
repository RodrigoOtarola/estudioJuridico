<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    use HasFactory;

    //Relacion con tabla causas
    public function causa(){
        return $this->hasOne(Causes::class,'tribunal_id');

    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable =['cause_id','description'];

    public function causa(){
        return $this->belongsTo(Causes::class,'cause_id');
    }
}

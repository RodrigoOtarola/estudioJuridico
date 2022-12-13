<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causes extends Model
{
    use HasFactory;

    protected $fillable=['TypeCause_id','description'];

    protected $attributes = [
        'estado_causa_id' => 1,
    ];

    //Relacion con tabla pivot users
    public function user(){
        return $this->belongsToMany(User::class,'user_causes','cause_id');
    }

    //Relacion con tipo causa
    public function tipoCausa(){
        return $this->hasOne(TypeCause::class,'TypeCause_id');
    }

    //Relacion tabla pivot Causes_Tribunal
    public function tribunal(){
        return $this->belongsToMany(Tribunal::class,'_causes__tribunal','cause_id');
    }

    //Relacion tabla estado_Causa
    public function estado_causa(){
        return $this->belongsTo(Estado_causa::class);
    }

    public function comentarios(){
        return $this->belongsTo(Comments::class);
    }
}

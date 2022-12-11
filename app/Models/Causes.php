<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causes extends Model
{
    use HasFactory;

    protected $fillable=['TypeCause_id','description'];

    //Relacion con tabla pivot users
    public function user(){
        return $this->belongsToMany(User::class,'user_causes','cause_id');
    }

    //Relacion tabla pivort Causes_Tribunal
    public function tribunal(){
        return $this->belongsToMany(Tribunal::class,'_causes__tribunal','cause_id');
    }

}

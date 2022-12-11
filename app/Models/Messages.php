<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{
    use HasFactory;


    protected $fillable=['name','first_name','email','phone','subject','content','estadoTramite_id'];

    //Cambiar valor por defecto
    protected $attributes = [
        'estadoTramite_id' => 1,
    ];

    //Relacion 1:n invertido
    public function estadoTramite(){
        return $this->belongsTo(Estado_tramite::class,'estadoTramite_id');
    }

    use SoftDeletes;

}

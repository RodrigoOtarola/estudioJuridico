<?php

namespace App\Http\Controllers;

use App\Models\Estado_tramite;
use Illuminate\Http\Request;

class estadoTramite extends Controller
{
    //
    public function show(Estado_tramite $estadoTramite){
        return view('Messages.edit',[
            'estadoTramite'=>$estadoTramite,
        ]);
    }
}

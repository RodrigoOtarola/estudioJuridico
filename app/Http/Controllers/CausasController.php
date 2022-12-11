<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCausaRequest;
use App\Models\Causes;
use App\Models\Tribunal;
use App\Models\TypeCause;
use App\Models\User;
use Illuminate\Http\Request;

class CausasController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Poblar index de causas
        $causas = Causes::with(['user','tribunal'])->latest();

        return view('Causas.index',compact('causas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //Retorna tipos de causas
        $tipoCausas = TypeCause::pluck('name','id');

        //Retorna nombre de tribunales
        $tribunales = Tribunal::all();

        //Retorna usuarios con perfil abogado
        $abogados = User::join('assigned_roles','assigned_roles.user_id','=','users.id')->where('assigned_roles.role_id','=',2)->pluck('name','id');

        //Retorna usuarios con perfil usuario
        $clientes = User::join('assigned_roles','assigned_roles.user_id','=','users.id')->where('assigned_roles.role_id','=',1)->pluck('name','id');


        return view('Causas.create', compact(['tipoCausas','abogados','tribunales','clientes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCausaRequest $request)
    {
        //dd($request);
        //Para crear causa, parametros por el request
        $causa = Causes::create($request->all());

        //Inserta en tabla pivot user_causes, no se necesita ver duplicidad.
        $causa->tribunal()->attach($request->tribunal_id);

        //Inserta en tabla pivot user_causes, no se necesita ver duplicidad.
        $causa->user()->attach($request->user_id);

        return redirect()->route('causas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //politica de acceso

        $causas = Causes::findOrFail($id);

        return view('causas.edit',compact('causas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

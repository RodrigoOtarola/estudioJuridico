<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCausaRequest;
use App\Http\Requests\SaveCommentsRequest;
use App\Models\Causes;
use App\Models\Comments;
use App\Models\Estado_causa;
use App\Models\Tribunal;
use App\Models\TypeCause;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CausasController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Causas.index', [
            'newCausa' => new Causes,

            //Poblar tabla dinamica de Causas.index
            'causas' => Causes::with(['user'], ['tribunal'], 'estado_causa')->latest()->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //politica de acceso
        $this->authorize('create', $causa = new Causes);


        //Retorna tipos de causas
        $tipoCausas = TypeCause::pluck('name', 'id');

        //Retorna nombre de tribunales
        $tribunales = Tribunal::all();

        //Retorna usuarios con perfil abogado
        $abogados = User::join('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
            ->where('assigned_roles.role_id', '=', 2)
            ->pluck('name', 'id');

        //Retorna usuarios con perfil usuario
        $clientes = User::join('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
            ->where('assigned_roles.role_id', '=', 1)
            ->pluck('name', 'id');

        return view('Causas.create', compact(['tipoCausas', 'abogados', 'tribunales', 'clientes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Retorna causa
        $causas = Causes::findOrFail($id);

        //Retorna tipos de causas
        $tipoCausas = TypeCause::pluck('name', 'id');

        //Retorna nombre de tribunales
        $tribunales = Tribunal::with('tribunal')->pluck('name', 'id');

        $comentarios = Comments::with('causa')->where('comments.cause_id','=',$id)->get();

        //Retorna vista
        return view('Causas.show', compact(['causas', 'tipoCausas', 'tribunales', 'comentarios']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //politica de acceso

        $causas = Causes::findOrFail($id);

        return view('causas.edit', compact('causas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function crearComentario($id)
    {

        //Retorna causa
        $causa = Causes::findOrFail($id);

        //Retorna estado_causa
        $estadoCausa = Estado_causa::pluck('estado', 'id');

        return view('Causas.comments', compact(['causa', 'estadoCausa']));
    }

    public function guardarComentario(SaveCommentsRequest $request)
    {
        //Para crear causa, parametros por el request
        $comentario = Comments::create($request->all());

        $comentario->save();

        return redirect()->route('causas.index');
    }
}

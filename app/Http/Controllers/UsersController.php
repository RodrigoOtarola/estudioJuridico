<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    function __construct(){
        //$this->middleware('roles:admin',['except'=>['edit','update','show']]);//Para que ignore el metodo edit

        $this->middleware('auth');
        //$this->middleware('roles:admin',['except'=>['edit','update','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with(['roles'])->latest()->get();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('display_name','id');

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //Para inserta nueva usuario, parametros por el request
        $user = User::create($request->all());

        //Para insertar roles, como es usuario nuevo, no se necesita ver duplicidad.
        $user->roles()->attach($request->roles);

        return redirect()->route('usuarios.index');
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
        $user = User::findOrFail($id);

        //Para mostrar roles en editar usuario
        $roles = Role::pluck('display_name','id');

        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        //Solo permite actualizar name, phone y email.
        $user->update($request->only('name','phone','email'));

        //Para actualizar roles, metodo sync para evitar duplicaciones
        $user->roles()->sync($request->roles);

        return redirect()->route('usuarios.index');//->with('info','Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return route('usuarios.index')->with('eliminar','ok');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function __construct()
    {
        //Pedira login a exception de index y show
        $this->middleware('auth')->except('index', 'show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->get();

        return view('Team.index', compact('teams'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTeamRequest $request)
    {
        //

        $teams = new Team($request->validated());

        //Mover imagen de directorio temporal a carpeta del server
        $teams->image = $request->file('image')->store('images');

        $teams->save();
        //$Team = Team::create($request->all());

        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Team::findOrFail($id);

        return view('Team.edit', compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, SaveTeamRequest $request)
    {
        $teams = Team::findOrFail($id);

        if ($request->hasFile('image')) {

            //Para eliminar imagen anterior si, se actualiza imagen.
            Storage::delete($teams->image);

            $teams->fill($request->validated());

            $teams->image = $request->file('image')->store('images');

            $teams->save();
        } else {

            //Para no actualizar la foto
            $teams->update(array_filter($request->validated()));
        }

        return redirect()->route('team.index', $teams);
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
        $teams = Team::findOrFail($id);

        Storage::delete($teams->image);

        $teams->delete();

        return redirect()->route('team.index')->with('eliminar','ok');
    }
}

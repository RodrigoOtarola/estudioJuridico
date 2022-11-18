<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveNewRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $news = News::latest()->get();

        return view('home', compact('news'));
    }

    public function listarNoticias()
    {

        $news = News::latest()->get();

        return view('News.list', compact('news'));
    }

    public function create()
    {
        return view('News.create');
    }

    public function store(SaveNewRequest $request)
    {

        $news = new News($request->validated());

        //Mover imagen de directorio temporal a carpeta del server
        $news->img = $request->file('img')->store('imgSlider');

        $news->save();

        return redirect()->route('noticias.index');

    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('News.edit', compact('news'));
    }

    public function update($id, SaveNewRequest $request)
    {

        $news = News::findOrFail($id);

        //Condicion para actualizar imagen y eliminar la antigua
        if ($request->hasFile('img')) {

            Storage::delete($news->img);

            $news->fill($request->validated());

            $news->img = $request->file('img')->store('imgSlider');

            $news->save();

        } else {

            //Para actualizar solo el texto
            $news->update(array_filter($request->validated()));
        }


        return redirect()->route('listarNoticias',$news);
    }

    //Eliminación, se puede restaurar con soft delete
    public function destroy($id)
    {
        //
        $news = News::findOrFail($id);

        //Storage::delete($news->img);

        $news->delete();

        return redirect()->route('listarNoticias')->with('eliminar','ok');
    }

    //Restaurar noticia, solo para perfiles administrador
    public function restore($newId){

        $new = News::withoutTrashed()->whereId($newId)->firstOrFail();

        //Autorización


        //Resataurar noticia
        $new->restore();

        return redirect()->route('noticias.index')->with('status', 'Proyecto restaurado');
    }

    //Forzar eliminación solo para perfiles administrador
    public function forceDelete($newTitle){
        $new = News::withoutTrashed()->whereTitle($newTitle)->firstOrFail();

        //Autorización

        //Elimina imagen
        Storage::delete($new->img);

        $new->forceDelete();

        return redirect()->route('noticias.index')->with('status', 'Proyecto eliminado permanentemente');
    }
}

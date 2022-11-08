<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMessageRequest;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{

    public function __construct()
    {
        //Pedira login a exception de index y show
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Messages::latest()->get();

        return view('Messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveMessageRequest $request)
    {
        //
        $messages = Messages::create($request->all());

        //Responde correo entorno local
        //Recibe 3 parametro vista, arreglo con la info a pasar y funcion anonima que recibre $message

        Mail::send('emails.contact',['msg'=>$messages], function($m) use ($messages){

            $m->to($messages->email, $messages->name)->subject('Mensaje recibido con exito');
        });

        //Rediccionar
        return redirect()->route('contact')->with('info','Hemos recibido tu mensaje');

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
        //
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

<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trainers = Trainer::all(); //me da el listado de todos los entrenadores

        //compact lo que hace es generar array con la informacion que asignemos

        return view('trainers.index',compact('trainers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = null;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->description = $request->input('description');
        $trainer->avatar = $name;
        $trainer->save();
        return 'saved';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {

        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail();
        return view('trainers.show',compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit',compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Trainer $trainer) //SE CAMBIA ID PARA USAR EL IMPLICIT BINDING
    {
        $trainer->fill($request->except('avatar'));
        $name = null;

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/', $name);
        }
        $trainer->save();
        return 'editado';
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

<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscador = $request->buscar;
        $propietario= Propietario::where('cedula', 'LIKE', '%' .$buscador . '%')
        ->orwhere('telefono' , 'LIKE' , '%' . $buscador . '%')
        ->Paginate(3);
        return view ('propietarios.index', compact('propietario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $propietario = new Propietario();
        $propietario->cedula = $request->cedula;
        $propietario->telefono = $request->telefono;

        $propietario->save();

        return redirect()->route('Propietario.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propietario = Propietario::find($id);
        return view ('propietarios.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $propietario = Propietario::find($id);
        $propietario->cedula = $request->cedula;
        $propietario->telefono = $request->telefono;

        $propietario->save();
        return redirect()->route('Propietario.index', compact('propietario'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Propietario::destroy($id);
        return redirect()->route('Propietario.index');
    }
}

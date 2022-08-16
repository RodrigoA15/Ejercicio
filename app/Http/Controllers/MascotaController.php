<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Validator;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscador = $request->buscar;
        $mascota = Mascota::where('nombre', 'LIKE', '%'. $buscador . '%')
        ->orwhere('tipo', 'LIKE', '%' . $buscador . '%')
        ->Paginate(3);
        return view ('mascotas.index', compact('mascota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propietario = Propietario::all();
        return view('mascotas.create', compact('propietario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar = Validator::make($request->all(), [
            'nombre' => 'required'
        ]);

        if(!$validar->fails()){ 
        
        $mascota = new Mascota();

        $mascota->nombre = $request->nombre;
        $mascota->estado= $request->estado;
        $mascota->guacal = $request->guacal;
        $mascota->tipo = $request->tipo;
        $mascota->propietario_id = $request->propietario_id;

        $mascota->save();
        if($mascota){
            Alert::success('Realizado', 'Que crack');
            return  redirect()->route('Mascota.index');

        }
        }
        else{
            Alert::error('Failed', 'Matese mi socio');
            return redirect('/Mascota/create');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::find($id);
        return view('mascotas.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mascota = Mascota::find($id);
        $mascota->nombre = $request->nombre;
        $mascota->estado= $request->estado;
        $mascota->guacal = $request->guacal;
        $mascota->tipo = $request->tipo;
        $mascota->save();

        return redirect()->route('Mascota.index', compact('mascota'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mascota::destroy($id);
        return redirect()->route('Mascota.index');
    }

    
}

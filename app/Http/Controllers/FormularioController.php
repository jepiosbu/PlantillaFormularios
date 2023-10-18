<?php

namespace App\Http\Controllers;
use App\Models\categoria;
use App\Models\formulario;
use Illuminate\Http\Request;
use App\Models\item_type;
use App\Models\item;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos= item_type::all();
        return view('/formulario',compact('tipos'));
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
    public function store(Request $request)
    {
        $boton= $request->input('definitivo');
        if($boton=="Guardar Formulario")
        {
            $inserta= new formulario();
            $inserta->namef=$request->namef;
            $inserta->save();
            $con=$request->numeroCategorias;
        for ($i=0; $i < $con ; $i++) { 
            $insertac= new categoria();
            $insertac->namec=$request->vector[$i]['nameCategoria'];
            $insertac->formulario_id=$inserta->id;
            $insertac->save();
            $cone=$request->vector[$i]['numeroItem'];
            for ($h=0; $h < $cone; $h++)
            {
                $insertai= new item();
                $insertai->namei=$request->vector[$h]['nameElemento'];
                $insertai->categoria_id=$insertac->id;
                $insertai->item_type_id=$request->vector[$h]['item_type'];
                $insertai->save();
            }
        }
        return "Guardado Correcto";
        }
        return redirect()->back()->withInput();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function show(formulario $formulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(formulario $formulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, formulario $formulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(formulario $formulario)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $servicio = Servicio::create($request->all());

        return response()->json([
            'message' => 'Servicio creado exitosamente',
            'data' => $servicio
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $servicio = Servicio::findOrFail($id);
        $servicio->update($request->all());
        return response()->json([
            'message' => 'Servicio actualizado exitosamente',
            'data' => $servicio
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $servicio = Servicio::findOrFail($id);

        $servicio->delete();

        return response()->json([
            'message' => 'Servicio eliminado exitosamente'
        ]);
    }
}

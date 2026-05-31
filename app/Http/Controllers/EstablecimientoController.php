<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEstablecimientoRequest;

use App\Models\Establecimiento;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $porPagina = $request->input('per_page', 10);
        $paginaActual = $request->input('page', 1);
        $busqueda = $request->input('search', '');
        $categoriaId = $request->input('categoria_id');

        $establecimientos = Establecimiento::with(['categoria'])->when($busqueda, function ($query, $busqueda) {
            $query->where('nombre', 'like', "%{$busqueda}%")
                ->orWhere('descripcion', 'like', "%{$busqueda}%")
                ->orWhere('direccion', 'like', "%{$busqueda}%");
        })->when($categoriaId, function ($query, $categoriaId) {
                $query->where('categoria_id', $categoriaId);
            })
            ->paginate($porPagina, ['*'], 'page', $paginaActual);

        return response()->json($establecimientos);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstablecimientoRequest $request)
    {

        $imagen = $request->file('archivo_imagen');

        $nombreArchivo = $imagen->store('uploads','public');
        $request->merge(['imagen' => $nombreArchivo, 'estado' => 'ACTIVO']);

        $establecimiento = Establecimiento::create($request->all());
        return response()->json([
            'message' => 'Establecimiento creado exitosamente',
            'data' => $establecimiento
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $establecimiento = Establecimiento::with(['categoria', 'servicios'])->findOrFail($id);

        return response()->json([
            'data' => $establecimiento
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

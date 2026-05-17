<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $porPagina = $request->input('per_page', 10);
        $busqueda = $request->input('search');
        $paginaActual = $request->input('page', 1);

        $categorias = Categoria::when($busqueda, function ($query, $busqueda) {
            $query->where('nombre', 'like', "%{$busqueda}%");
        })
        ->paginate($porPagina, ['*'],'page', $paginaActual );
        return response()->json($categorias);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        //
        $categoria = Categoria::create($request->all());
        return response()->json([
            'message' => 'Categoria creada exitosamente',
            'data' => $categoria
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json([
            'data' => $categoria
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoriaRequest $request, string $id)
    {
         $categoria = Categoria::findOrFail($id);
         $categoria->update($request->all());

        return response()->json([
            'message' => 'Categoria actualizada exitosamente',
            'data' => $categoria
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();
        return response()->json([
            'message' => 'Categoria eliminada exitosamente'
        ]);
    }
}

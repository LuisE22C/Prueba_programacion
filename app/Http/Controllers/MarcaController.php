<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    // Listar marcas
    public function index()
    {
        $marcas = DB::select("SELECT * FROM marca");
        return view('marcas.index', compact('marcas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('marcas.create');
    }

    // Guardar nueva marca usando SP
    public function store(Request $request)
    {
        $request->validate([
            'nombre_marca' => 'required|string|max:100',
        ]);

        DB::statement("CALL sp_insertar_marca(?)", [$request->nombre_marca]);

        return redirect()->route('marcas.index')->with('success', 'Marca creada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $marca = DB::select("SELECT * FROM marca WHERE id_marca = ?", [$id]);
        if (!$marca) {
            return redirect()->route('marcas.index')->with('error', 'Marca no encontrada');
        }
        return view('marcas.edit', ['marca' => $marca[0]]);
    }

    // Actualizar marca (sin SP, ejemplo directo)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_marca' => 'required|string|max:100',
        ]);

        DB::update("UPDATE marca SET nombre_marca = ? WHERE id_marca = ?", [$request->nombre_marca, $id]);

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada correctamente.');
    }

    // Eliminar marca
    public function destroy($id)
    {
        DB::delete("DELETE FROM marca WHERE id_marca = ?", [$id]);
        return redirect()->route('marcas.index')->with('success', 'Marca eliminada correctamente.');
    }
}

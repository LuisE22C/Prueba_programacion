<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{

    public function index()
    {
        $equipos = DB::select("
            SELECT e.id_equipo, m.nombre_marca, e.tipo_equipo, e.modelo, e.serie, e.descripcion
            FROM equipo e
            INNER JOIN marca m ON e.id_marca = m.id_marca
            ORDER BY e.id_equipo DESC
        ");
        return view('equipos.index', compact('equipos'));
    }

 
    public function create()
    {
        $marcas = DB::select("SELECT * FROM marca ORDER BY nombre_marca ASC");
        return view('equipos.create', compact('marcas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_marca' => 'required|integer',
            'tipo_equipo' => 'required|string|max:50',
            'modelo' => 'nullable|string|max:100',
            'serie' => 'nullable|string|max:100',
            'descripcion' => 'nullable|string'
        ]);

        DB::statement("CALL sp_insertar_equipo(?, ?, ?, ?, ?)", [
            $request->id_marca,
            $request->tipo_equipo,
            $request->modelo,
            $request->serie,
            $request->descripcion
        ]);

        return redirect()->route('equipos.index')->with('success', 'Equipo registrado correctamente.');
    }


    public function edit($id)
    {
        $equipo = DB::select("SELECT * FROM equipo WHERE id_equipo = ?", [$id]);
        if (!$equipo) {
            return redirect()->route('equipos.index')->with('error', 'Equipo no encontrado.');
        }
        $marcas = DB::select("SELECT * FROM marca ORDER BY nombre_marca ASC");
        return view('equipos.edit', ['equipo' => $equipo[0], 'marcas' => $marcas]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_marca' => 'required|integer',
            'tipo_equipo' => 'required|string|max:50',
            'modelo' => 'nullable|string|max:100',
            'serie' => 'nullable|string|max:100',
            'descripcion' => 'nullable|string'
        ]);

        DB::update("
            UPDATE equipo 
            SET id_marca = ?, tipo_equipo = ?, modelo = ?, serie = ?, descripcion = ?
            WHERE id_equipo = ?
        ", [
            $request->id_marca,
            $request->tipo_equipo,
            $request->modelo,
            $request->serie,
            $request->descripcion,
            $id
        ]);

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }


    public function destroy($id)
    {
        DB::delete("DELETE FROM equipo WHERE id_equipo = ?", [$id]);
        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }
}

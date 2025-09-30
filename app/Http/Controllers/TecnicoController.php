<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnicos = DB::select("SELECT * FROM tecnico");
        return view('tecnicos.index', compact('tecnicos'));
    }

    public function create()
    {
        return view('tecnicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'especialidad' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150',
        ]);

        DB::statement("CALL sp_insertar_tecnico(?, ?, ?, ?, ?)", [
            $request->nombre,
            $request->apellido,
            $request->especialidad,
            $request->telefono,
            $request->email,
        ]);

        return redirect()->route('tecnicos.index')->with('success', 'Técnico creado correctamente.');
    }

    public function edit($id)
    {
        $tecnico = DB::select("SELECT * FROM tecnico WHERE id_tecnico = ?", [$id]);
        if (!$tecnico) {
            return redirect()->route('tecnicos.index')->with('error', 'Técnico no encontrado');
        }
        return view('tecnicos.edit', ['tecnico' => $tecnico[0]]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'especialidad' => 'nullable|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:150',
        ]);

        DB::update("
            UPDATE tecnico 
            SET nombre = ?, apellido = ?, especialidad = ?, telefono = ?, email = ? 
            WHERE id_tecnico = ?",
            [
                $request->nombre,
                $request->apellido,
                $request->especialidad,
                $request->telefono,
                $request->email,
                $id
            ]
        );

        return redirect()->route('tecnicos.index')->with('success', 'Técnico actualizado correctamente.');
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM tecnico WHERE id_tecnico = ?", [$id]);
        return redirect()->route('tecnicos.index')->with('success', 'Técnico eliminado correctamente.');
    }
}

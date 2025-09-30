<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
  
    public function index()
    {
    
        $servicios = DB::select("
            SELECT s.id_servicio, c.nombre AS cliente, e.tipo_equipo, s.estado, s.fecha_recepcion
            FROM servicio s
            INNER JOIN cliente c ON s.id_cliente = c.id_cliente
            INNER JOIN equipo e ON s.id_equipo = e.id_equipo
            ORDER BY s.id_servicio DESC
        ");

        return view('servicios.index', compact('servicios'));
    }


    public function listarPorEstado($estado)
    {
        $servicios = DB::select("CALL sp_listar_servicios_por_estado(?)", [$estado]);
        return view('servicios.index', compact('servicios'));
    }

    public function listarPorTecnico($id)
    {
        $servicios = DB::select("CALL sp_listar_servicios_por_tecnico(?)", [$id]);
        return view('servicios.index', compact('servicios'));
    }

  
    public function create()
    {
        $clientes = DB::select("SELECT * FROM cliente ORDER BY nombre ASC");
        $tecnicos = DB::select("SELECT * FROM tecnico ORDER BY nombre ASC");
        $equipos = DB::select("
            SELECT e.id_equipo, CONCAT(m.nombre_marca, ' - ', e.modelo) AS nombre_equipo
            FROM equipo e
            INNER JOIN marca m ON e.id_marca = m.id_marca
            ORDER BY nombre_equipo ASC
        ");

        return view('servicios.create', compact('clientes', 'tecnicos', 'equipos'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required|integer',
            'id_equipo' => 'required|integer',
            'id_tecnico' => 'required|integer',
            'fecha_recepcion' => 'required|date',
            'problema_reportado' => 'required|string'
        ]);

        DB::statement("CALL sp_insertar_servicio(?, ?, ?, ?, ?)", [
            $request->id_cliente,
            $request->id_equipo,
            $request->id_tecnico,
            $request->fecha_recepcion,
            $request->problema_reportado
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio registrado correctamente.');
    }


    public function show($id)
    {
        $detalle = DB::select("CALL sp_detalle_servicio(?)", [$id]);

        if (!$detalle) {
            return redirect()->route('servicios.index')->with('error', 'Servicio no encontrado.');
        }

        return view('servicios.show', ['servicio' => $detalle[0]]);
    }


    public function edit($id)
    {
        $detalle = DB::select("CALL sp_detalle_servicio(?)", [$id]);

        if (!$detalle) {
            return redirect()->route('servicios.index')->with('error', 'Servicio no encontrado.');
        }

        return view('servicios.edit', ['servicio' => $detalle[0]]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:recibido,reparando,finalizado,entregado',
            'fecha_entrega' => 'nullable|date',
            'diagnostico' => 'nullable|string',
            'solucion' => 'nullable|string'
        ]);


        DB::statement("CALL sp_actualizar_estado_servicio(?, ?, ?)", [
            $id,
            $request->estado,
            $request->fecha_entrega
        ]);

 
        DB::statement("CALL sp_actualizar_diagnostico_solucion(?, ?, ?)", [
            $id,
            $request->diagnostico,
            $request->solucion
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

   
    public function destroy($id)
    {
        DB::delete("DELETE FROM servicio WHERE id_servicio = ?", [$id]);
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}

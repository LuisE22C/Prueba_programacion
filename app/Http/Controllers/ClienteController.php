<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::listarClientes();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::insertarCliente(
            $request->nombre,
            $request->apellido,
            $request->telefono,
            $request->email,
            $request->direccion
        );
        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $cliente = collect(Cliente::listarClientes())->firstWhere('id_cliente', $id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        Cliente::actualizarCliente(
            $id,
            $request->nombre,
            $request->apellido,
            $request->telefono,
            $request->email,
            $request->direccion
        );
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        Cliente::eliminarCliente($id);
        return redirect()->route('clientes.index');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;


    public static function insertarCliente($nombre, $apellido, $telefono, $email, $direccion)
    {
        DB::statement("CALL sp_insertar_cliente(?, ?, ?, ?, ?)", [
            $nombre, $apellido, $telefono, $email, $direccion
        ]);
    }


    public static function listarClientes()
    {
        return DB::select("SELECT * FROM cliente");
    }


    public static function eliminarCliente($id)
    {
        return DB::delete("DELETE FROM cliente WHERE id_cliente = ?", [$id]);
    }

    public static function actualizarCliente($id, $nombre, $apellido, $telefono, $email, $direccion)
    {
        return DB::update("UPDATE cliente 
                           SET nombre=?, apellido=?, telefono=?, email=?, direccion=? 
                           WHERE id_cliente=?", [
            $nombre, $apellido, $telefono, $email, $direccion, $id
        ]);
    }
}

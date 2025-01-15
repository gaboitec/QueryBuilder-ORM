<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Pedido;

class UserController extends Controller
{
    public function insertarRegistros()
    {
        // #1 Insertar usuarios
        Usuario::create(['nombre' => 'Juan', 'email' => 'juan@ejemplo.com']);
        Usuario::create(['nombre' => 'María', 'email' => 'maria@ejemplo.com']);
        Usuario::create(['nombre' => 'Pedro', 'email' => 'pedro@ejemplo.com']);
        Usuario::create(['nombre' => 'Ana', 'email' => 'ana@ejemplo.com']);
        Usuario::create(['nombre' => 'Luis', 'email' => 'luis@ejemplo.com']);

        // #1 Insertar pedidos
        Pedido::create(['usuario_id' => 1, 'total' => 150.00]);
        Pedido::create(['usuario_id' => 2, 'total' => 200.00]);
        Pedido::create(['usuario_id' => 3, 'total' => 250.00]);
        Pedido::create(['usuario_id' => 4, 'total' => 100.00]);
        Pedido::create(['usuario_id' => 5, 'total' => 300.00]);
    }

    //#2 Obtener todos los registros de la tabla usuarios en base al ID
    public function obtenerPedidosUsuario($id)
    {
        $pedidos = Pedido::where('usuario_id', $id)->get();
        return $pedidos;
    }

    //#3 Obtener la información detallada de los pedidos, incluyendo el nombre y correo 
    //electrónico de los usuarios. 
    public function obtenerPedidosConUsuarios()
    {
        $pedidos = Pedido::with('usuario')->get();
        return $pedidos;
    }

    //#4 Obtener los pedidos en base a rangos de precio
    public function obtenerPedidosEnRango()
    {
        $pedidos = Pedido::whereBetween('total', [100, 250])->get();
        return $pedidos;
    }

    //#5 Obtener los usuarios cuyo nombre inicie con la letra R
    public function obtenerUsuariosConR()
    {
        $usuarios = Usuario::where('nombre', 'like', 'R%')->get();
        return $usuarios;
    }

    //#6 Obtener el total de pedidos de un usuario
    public function contarPedidosUsuario($id)
    {
        $totalPedidos = Pedido::where('usuario_id', $id)->count();
        return $totalPedidos;
    }

    //#7 Obtener el total de pedidos de cada usuario
    public function obtenerPedidosOrdenados()
    {
        $pedidos = Pedido::with('usuario')->orderBy('total', 'desc')->get();
        return $pedidos;
    }

    //#8 Obtener la suma del campo "total" de todos los pedidos
    public function obtenerSumaTotalPedidos()
    {
        $sumaTotal = Pedido::sum('total');
        return $sumaTotal;
    }

    //#9 Obtener el pedido más económico
    public function obtenerPedidoMasEconomico()
    {
        $pedido = Pedido::with('usuario')->orderBy('total', 'asc')->first();
        return $pedido;
    }

    //#10 Obtener los pedidos agrupados por usuario
    public function obtenerPedidosAgrupadosPorUsuario()
    {
        $pedidos = Pedido::select('usuario_id', DB::raw('SUM(total) as total'))
            ->groupBy('usuario_id')
            ->with('usuario')
            ->get();
        return $pedidos;
    }
}

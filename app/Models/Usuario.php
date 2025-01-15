<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Especificar la tabla asociada al modelo
    protected $table = 'usuarios';

    // Especificar los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'email'];

    // Definir la relación con el modelo Pedido
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }
}

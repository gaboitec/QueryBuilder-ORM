<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Especificar la tabla asociada al modelo
    protected $table = 'pedidos';

    // Especificar los campos que se pueden asignar masivamente
    protected $fillable = ['usuario_id', 'total'];

    // Definir la relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Especifica la tabla si el nombre no sigue el formato plural de Laravel
    protected $table = 'producto';

    // Si tienes campos como `created_at` y `updated_at`, Laravel los gestionará automáticamente
    public $timestamps = true;

    // Define los campos asignables en masa (si no usas fillable, Laravel permitirá la asignación masiva de cualquier campo)
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'precio_anterior',
        'stock',
        'imagen_principal',
        'idcategoria',
        'estado',
    ];

    // Relación con las imágenes del producto
    public function imagenes()
    {
        return $this->hasMany(ProductoImagen::class, 'producto_id');
    }

    // Relación con la categoría del producto
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    }

    protected $casts = [
        'caracteristicas' => 'array',
    ];

    public function atributos()
    {
        return $this->belongsToMany(
            \App\Models\ValorAtributo::class, // Modelo relacionado
            'producto_atributo', // Nombre de la tabla intermedia
            'id_producto', // Clave foránea en la tabla intermedia hacia producto
            'id_valor_atributo' // Clave foránea en la tabla intermedia hacia valores_atributo
        )->with('atributo'); // Carga la relación atributo desde valores_atributo
    }
    
}


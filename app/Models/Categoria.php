<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Cambia la clave primaria a 'id'
    public $timestamps = true; // La tabla tiene campos created_at y updated_at

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'imagen', 
        'slug', 
    ]; // Campos que se pueden asignar masivamente

    public function productos()
    {
        return $this->hasMany(Producto::class, 'idcategoria', 'id'); // Relación con la tabla productos
    }
    
    public function getCategoriaImagePathAttribute()
    {
    return asset("images/{$this->slug}/categoria.jpg");
    }
    public function show($slug)
{
    $producto = Producto::with(['categoria', 'imagenes'])->where('slug', $slug)->firstOrFail();
    $categoria = $producto->categoria;
    return view('components.producto_detalle', compact('producto', 'categoria'));
}



}

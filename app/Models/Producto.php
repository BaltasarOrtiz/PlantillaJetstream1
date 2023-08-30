<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'descripcion', 'image', 'precio', 'slug', 'categoria', 'stock'];
    #slug es para que no aparezca el id en la url, sino el titulo separado por guiones
}

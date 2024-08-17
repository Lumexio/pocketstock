<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'description',
        'category_id',
        'tipo_id',
        'proveedor_id',
        'marca_id',
        'crossbar_id',
        'rack_id',
        'status_id',
        'foto_product',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

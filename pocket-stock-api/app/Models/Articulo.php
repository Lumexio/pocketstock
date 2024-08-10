<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Articulo extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    use HasFactory, LogsActivity;

    /**
     ** The attributes that are mass assignable.
     *
     @var array
     *Aqui se especifica los campos de entrada o permitidos para llenar la tabla artículos con los campos de las tablas *foraneas
     */
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
        'foto_articulo',
        'user_id'
    ];

    //ACtivity log system
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'name',
                'quantity',
            ]);
        // Chain fluent methods for configuration options
        //$user = Auth::user();
        //Auth::login($user);
        activity()
            ->causedBy(Auth::id());
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

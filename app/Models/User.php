<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    
    protected $table = "users";
    protected $primaryKey  = "dni";
    public $incrementing = false;
    
    protected $fillable = [
        'nombre',
        'email',
        'dni',
        'capital_solicitado'
    ];

    public function simulaciones(): HasMany
    {
        return $this->hasMany(Simulation::class, 'dni', 'dni');
    }
}

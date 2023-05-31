<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulation extends Model
{
    protected $table = "simulations";
    protected $primaryKey  = ["id", "dni"];
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dni',
        'tae',
        'plazo',
        'cuota',
        'importe_total',
    ];
}

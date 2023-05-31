<?php

namespace App\Http\Controllers;

use App\Models\Simulation;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSimulationRequest;

class SimulationController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSimulationRequest $request, $dni)
    {
        try{
            $user = User::find($dni);
            $validator = $request->validated();
            
            $tae = $validator['tae'] / 100 / 12;
            $plazo = $validator['plazo'] * 12;
            
            $simulation = new Simulation();
            $simulation->dni = $dni;
            $simulation->tae = $validator['tae'];
            $simulation->plazo = $validator['plazo'];
            $simulation->cuota = $user->capital_solicitado * $tae / ( 1 - ( 1 + $tae ) ** (-$plazo));
            $simulation->importe_total = $simulation->cuota * $plazo;
            $user->simulaciones()->save($simulation);
            return response()->json(["code"=>200, 'data' => $simulation], 200);
        }catch (Throwable $e) {
            return response()->json(["code"=> 500, "errorMessage"=> "Error al reaiizar la operación."], 500);
        }
    }

}

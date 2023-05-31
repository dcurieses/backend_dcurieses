<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        try{
            return response()->json(["code"=>200, 'data' => UserResource::collection(User::all())], 200);
        }catch (Throwable $e) {
            return response()->json(["code"=> 500, "errorMessage"=> "Error al reaiizar la operación."], 500);
        }
    }

    public function getbydni($dni){
        try{
            $user = User::find($dni);
            return response()->json(["code"=>200, 'data' => UserResource::make($user)], 200);
        }catch (Throwable $e) {
            return response()->json(["code"=> 500, "errorMessage"=> "Error al reaiizar la operación."], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try{
            if(!$this->isValidDni($request->input('dni'))){
                return response()->json(["code"=> 400, "errorMessage"=> "DNI incorrecto."], 400);
            }
            $user = User::create($request->validated());
            return response()->json(["code"=>200, 'data' => UserResource::make($user)], 200);
        }catch (Throwable $e) {
            return response()->json(["code"=> 500, "errorMessage"=> "Error al reaiizar la operación."], 500);
        }
    }

    public function update(UpdateUserRequest $request, $dni)
    {
        try{
            $user = User::find($dni);
            if(User::find($request->input('dni')) != null && $request->input('dni') != $dni){
                return response()->json(["code"=> 400, "errorMessage"=> "Ya existe un usuario con ese dni."], 400);
            }else if($user == null){
                return response()->json(["code"=> 400, "errorMessage"=> "El usuario no existe."], 400);
            }
            if(!$this->isValidDni($request->input('dni'))){
                return response()->json(["code"=> 400, "errorMessage"=> "DNI incorrecto."], 400);
            }
            $user->update($request->validated());
            return response()->json(["code"=>200, 'data' => UserResource::make($user)], 200);
        }catch (Throwable $e) {
            return response()->json(["code"=> 500, "errorMessage"=> "Error al reaiizar la operación."], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(User $user)
    {
        try{
            return response()->json(["code"=>200, 'data' => User::destroy($dni)], 200);
        }catch (Throwable $e) {
            return response()->json(["code"=> 500, "errorMessage"=> "Error al reaiizar la operación."], 500);
        }
    }

    private function isValidDni($dni){
        $letter = substr($dni, -1);
        $numbers = substr($dni, 0, -1);
        return (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 );
    }
}

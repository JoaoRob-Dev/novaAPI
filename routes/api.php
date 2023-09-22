<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function(){
    return response()->json([
        'Success' => true
    ]);
});

Route::get('/',[ApiController::class,'acharUsuarios']);
Route::get('/acharUsuario/{id}',[ApiController::class,'acharUsuario']);
Route::post('/criarUsuario/{name}+{email}+{senha}',[ApiController::class,'criarUsuario']);
Route::put('/updateUsuario/{email}+{novoNome}',[ApiController::class,'updateUsuario']);
Route::delete('/deletarUsuario/{id}',[ApiController::class,'deletarUsuario']);
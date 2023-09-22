<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Valnameator;
use Illuminate\Http\Response;
use App\Http\Controllers;

class ApiController extends Controller
{

    public function acharUsuarios() {
        $dadosUsuarios = Usuario::All();
        $contador = $dadosUsuarios->count();

        return 'Usuarios: '.$contador.  $dadosUsuarios. Response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function criarUsuario($name, $email, $senha) {
        $Usuario = new Usuario;
        $Usuario->name = $name;
        $Usuario->email = $email;
        $Usuario->senha = $senha;
        $Usuario->save();
    
        return response()->json([
            "mensagem" => "Usuario criado",
            "name" => $name,
            "email" => $email,
            "senha" => $senha
        ], 201);
    }

    public function acharUsuario($name) {
        if (Usuario::where('name', $name)->exists()) {
            $Usuario = Usuario::where('name', $name)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Usuario, 200);
          } else {
            return response()->json([
              "message" => "Usuario not found"
            ], 404);
          }
    }

    public function updateUsuario($email, $novoNome) {
            $usuario = Usuario::find($email);

            return response()->json([
                "message" => $usuario
            ], 200);
            
        }

    public function deletarUsuario ($name) {
      // logic to delete a Usuario record goes here
    }
}

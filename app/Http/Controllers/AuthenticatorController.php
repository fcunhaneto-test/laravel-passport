<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticatorController extends Controller
{
    public function register(Request $request)
    {
        // nome email senha
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json(['resp' => 'Usuário Criado com sucesso!'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(!Auth::attempt($credenciais)) {
            return response()->json(['resp' => 'Acesso Negado'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('token de acesso')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['resp' => 'Deslogado com sucesso'], 200);
    }
}

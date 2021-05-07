<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Cliente;

class FacebookController extends Controller
{
    public function autenticar(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
        $user = Socialite::driver('facebook')->user();
        
        $token = $user->token;
        $refreshToken = $user->refreshToken;
        $expiresIn = $user->expiresIn;

        try{
            $cliente = Cliente::where('facebook_id', $user->getId())->firstOrFail();
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $cliente = new Cliente();
            $cliente->nome = $user->getName();
            $cliente->email = $user->getEmail();
            $cliente->facebook_id = $user->getId();
            $cliente->save();
        }

        session(["cliente" => $cliente->toArray()]);
        return redirect()->route("index");
    }   
}

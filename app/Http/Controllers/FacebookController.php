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
        $cliente = Cliente::where('facebook_id', $user->getId())->first();
	if(!$cliente){
            $cliente = new Cliente();
            $cliente->nome_dono = $user->getName();
            $cliente->email = $user->getEmail();
            $cliente->facebook_id = $user->getId();
	    $cliente->senha = '12345';
            $cliente->save();
        }
        session(["cliente" => $cliente->toArray()]);
        return redirect()->route("index");
    }   
}

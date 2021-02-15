<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelController extends Controller
{
    //

    public function login(){
        return view("painel.login");
    }

    public function index(){
        return view("painel.template.main");
    }
}

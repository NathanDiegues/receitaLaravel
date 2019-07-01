<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\receita;

class HomeController extends Controller
{
    public function index(){

        $receitas = receita::all();

        return view('welcome',[
            'receitas'  => $receitas
        ]);
    }
}

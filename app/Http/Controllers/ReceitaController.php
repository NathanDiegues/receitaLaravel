<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\receita;

class ReceitaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $receitas = receita::all();

        return view('home', [
            'receitas'  =>  $receitas
        ]);
    }

    public function cadastrar(){
        return view('cadastrar');
    }

    public function registrar(Request $request){
        if($request){

            $request->validate([
                'titulo'  =>  'required|max:191',
                'preparo'  =>  'required|max:191',
            ]);

            $ingredientes = "";
            foreach($request->input('ingrediente') as $ing){
                $ingredientes .= $ing.",";
            }

            $ingredientes = rtrim($ingredientes, ',');

            $receita = new receita;
            $receita->titulo = $request->input('titulo');
            $receita->ingredientes = $ingredientes;
            $receita->preparo = $request->input('preparo');

            if($receita->save()){
                return redirect()->route('receita')->with('status', 'Receita adicionada com sucesso!');
            }

        }
    }

    public function editar($id){
        $receita = receita::find($id);

        $ingredientes = explode(',',$receita->ingredientes);

        return view('cadastrar', [
            'receita'  =>  $receita,
            'ingredientes'  =>  $ingredientes
        ]);
    }

    public function alterar(Request $request, $id){
        if($request){

            $request->validate([
                'titulo'  =>  'required|max:191',
                'preparo'  =>  'required|max:191',
            ]);

            $ingredientes = "";
            foreach($request->input('ingrediente') as $ing){
                $ingredientes .= $ing.",";
            }
            
            $ingredientes = rtrim($ingredientes, ',');

            $receita = receita::find($id);
            $receita->titulo = $request->input('titulo');
            $receita->ingredientes = $ingredientes;
            $receita->preparo = $request->input('preparo');

            if($receita->save()){
                return redirect()->route('receita')->with('status', 'Receita alterada com sucesso!');
            }

        }
    }

    public function deletar($id){
        if($id){
            $receita = receita::find($id);
            
            
            if($receita->delete()){
                return redirect()->route('receita')->with('status', 'Receita removida com sucesso!');
            }
        }
    }

    public function ver($id){
        if($id){
            $receita = receita::find($id);
            
            $ingredientes = explode(',',$receita->ingredientes);

            return view('ver',[
                'receita'   =>  $receita,
                'ingredientes'  =>  $ingredientes
            ]);
        }
    }
}

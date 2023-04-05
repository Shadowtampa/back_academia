<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use App\Models\Treino;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $exercicios_count = Exercicio::count();
        $treino_count = Treino::count();
        $treinos = Treino::all();
    
        return view('pages.dashboard')
            ->with('exercicios_count', $exercicios_count)
            ->with('treino_count', $treino_count)
            ->with('treinos', $treinos);
    }

    public function handleCreateTreino(){
        $treinos = Treino::all();
        return view('pages.treinoForm')->with('treinos', $treinos);
    }
}

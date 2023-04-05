<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTreinoRequest;
use App\Models\Exercicio;
use App\Models\Treino;
use Illuminate\Http\Request;

class TreinoController extends Controller
{

    public function index()
    {
        $treinos = Treino::all();
        return response()->json($treinos, 200);

    }

    public function show($id)
    {
        $treino = Treino::whereId($id);
        return response()->json($treino, 200);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $treino = new Treino();


        $treino->dayOfTheWeek = $request->dayOfTheWeek;
        $treino->title = $request->title;

        $treino->save();

        foreach (explode(";", $request->exercicios) as $exercicio) {

            $exericio_db = Exercicio::where('title', $exercicio)->first();
            if ($exercicio != null) {
                $exericio_db->treinos()->attach($treino->id);
            }

        }

        return redirect('/user-management');
    }

    public function update(Request $request, $id)
    {
        dd([$request->all, $id]);
        $treino = Treino::findOrFail($id);

        $treino->title = $request->input('title');
        $treino->dayOfTheWeek = $request->input('dayOfTheWeek');
        $treino->save();

        return response()->json(['message' => 'Treino atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $treino = Treino::findOrFail($id);
        $treino->exercicios()->detach();
        $treino->delete();

        return redirect('/user-management');
    }


}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExercicioRequest;
use App\Models\Exercicio;
use Illuminate\Http\Request;

class ExercicioController extends Controller
{

    public function index()
    {
        $exercises = Exercicio::all();
        return response()->json($exercises, 200);

    }

    public function show($id)
    {
        $exercises = Exercicio::whereId($id);
        return response()->json($exercises, 200);
    }

    public function store(StoreExercicioRequest $request)
    {
        $exercises = Exercicio::create($request->all());
        return redirect('exercise-management');
    }

    public function update(StoreExercicioRequest $request, $id)
    {
        $exercise = Exercicio::findOrFail($id);
        $exercise->update($request->all());

        return response()->json($exercise, 200);
    }

    public function destroy($id)
    {
        $exercise = Exercicio::findOrFail($id);
        $exercise->delete();

        return response()->json(['message' => 'Exercicio removido com sucesso'], 200);
    }
}

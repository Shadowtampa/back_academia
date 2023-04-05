@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Criação de treino'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Treino</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        <form class="pb-0 mt-4 mx-4" method="POST" action="{{ '/training-store' }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="title">Inserir Título</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Treino A" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="title">Inserir dia da semana</label>
                                    @foreach ($diasDaSemana as $dia)
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="dayOfTheWeek"
                                                id="{{ $dia }}" value="{{ $dia }}"
                                                onclick="updateDiaSemana(this)" />
                                            <label class="custom-control-label"
                                                for="{{ $dia }}">{{ $dia }}</label>
                                        </div>
                                    @endforeach
                                    <input type="hidden" name="exercicios" id="exercicios" value="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="title">Inserir Exercicios</label>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Exercicios
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="treinos">

                                                @foreach ($exercicios as $exercicio)
                                                    <li><a class="dropdown-item" href="#"
                                                            onclick="addItem('{{ $exercicio->title }}')">{{ $exercicio->title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Lista de Exercicios</label>
                                        <ul id="listaExercicios"></ul>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-success btn-sm pull-end">Adicionar Treino</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function addItem(item) {
        var lista = document.getElementById("listaExercicios");
        var li = document.createElement("li");

        var exercicios = document.getElementById("exercicios");

        li.appendChild(document.createTextNode(item));
        lista.appendChild(li);

        exercicios.value += item + ';';
    }
</script>

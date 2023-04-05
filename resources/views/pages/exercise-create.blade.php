@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Criação de Exercício'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Exercício</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        <form class="pb-0 mt-4 mx-4" method="POST" action="{{ '/exercise-store'}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="title">Inserir Título</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Rosca Direta" />
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

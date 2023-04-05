@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Exercicios Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Exercicios</h6>
                    <a type="button" class="btn" href="/exercise-create">Adicionar</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>

                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($exercicios as $exercicio)
                                    <tr>
                                        
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $exercicio->title }}</p>
                                        </td>
                                        <td>
                                            <button>visualizar</button>
                                        </td>
                                        <td>
                                            <button>editar</button>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

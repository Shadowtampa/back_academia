@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => $treino->title])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0" style="{marginTop: '100px'}">
                    <h6>{{ $treino->title }}</h6>
                    <a type="button" class="btn" href="/training-create">Adicionar</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title
                                    </th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($treino->exercicios as $exercicio)
                          
                                    <tr>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $exercicio->title }}</p>
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

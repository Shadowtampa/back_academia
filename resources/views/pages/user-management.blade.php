@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Treinos Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0" style="{marginTop: '100px'}">
                    <h6>Treinos</h6>
                    <a type="button" class="btn" href="/training-create">Adicionar</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Day
                                        Of The Week

                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($treinos as $treino)
                                    <tr>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $treino->title }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $treino->dayOfTheWeek }}</p>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach ($treino->exercicios()->get() as $exercicio)
                                                    <li>{{$exercicio->title}}</li>
                                                @endforeach

                                            </ul>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ "/training-destroy/{$treino->id}" }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn bg-gradient-danger btn-sm pull-end">Deletar
                                                    Treino</button>
                                            </form>

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

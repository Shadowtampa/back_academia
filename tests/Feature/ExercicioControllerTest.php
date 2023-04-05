<?php

use App\Models\Exercicio;
use App\Models\Treino;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExercicioControllerTest extends TestCase
{
    protected $token;
    public function setUp(): void
    {
        parent::setUp();

        // Cadastrando um usuário para os testes
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ];

        $response = $this->post('/api/register', $userData);

        // Verifica se o registro foi feito com sucesso
        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $this->token = $response['authorisation']['token'];
    }


    /**
     * Testa a inserção de um novo exercício.
     *
     * @return void
     */
    public function testStore()
    {
        // Cria um objeto Treino
        $treino = Treino::create([
            'title' => 'Treino A',
            'dayOfTheWeek' => 'segunda'
        ]);

        // Define os dados do exercício a serem inseridos
        $data = [
            'treino_id' => $treino->id,
            'title' => 'Exercício 1',
            'sessions' => 3,
            'reps' => 10,
        ];

        // Faz a chamada à rota para inserir o exercício
        $response = $this->post('/api/exercise', $data, [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        // Verifica se o exercício foi inserido com sucesso
        $response->assertStatus(201);
        $this->assertDatabaseHas('exercicios', $data);
    }

    public function testUpdate()
    {
        // Cria um objeto Treino
        $treino = Treino::create([
            'title' => 'Treino A',
            'dayOfTheWeek' => 'segunda'
        ]);

        $exercicio = Exercicio::create([
            'treino_id' => $treino->id,
            'title' => 'Exercício 1',
            'sessions' => 3,
            'reps' => 10,
        ]);

        $data = [
            'treino_id' => $treino->id,
            'title' => 'Exercício 1 update',
            'sessions' => 3,
            'reps' => 10,
        ];


        // Faz a chamada à rota para inserir o exercício
        $response = $this->put("/api/exercise/{$exercicio->id}", $data, [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        // Verifica se o exercício foi inserido com sucesso
        $response->assertStatus(200);
        $this->assertDatabaseHas('exercicios', $data);
    }
}

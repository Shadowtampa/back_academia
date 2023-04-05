<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Treino;

class TreinoControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

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

    public function testStoreMethod()
    {
        $data = [
            'title' => $this->faker->sentence(2),
            'dayOfTheWeek' => $this->faker->randomElement(['segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado', 'domingo']),
        ];

        $response = $this->postJson('/api/treino', $data);

        $response->assertStatus(201)
            ->assertJsonFragment($data);

        $this->assertDatabaseHas('treinos', $data);
    }

    public function testUpdateMethod()
    {
        $data = [
            'title' => $this->faker->sentence(2),
            'dayOfTheWeek' => $this->faker->randomElement(['segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado', 'domingo']),
        ];

        $response = $this->postJson('/api/treino', $data);

        $data = [
            'title' => $this->faker->sentence(4),
            'dayOfTheWeek' => $this->faker->randomElement(['segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado', 'domingo']),
        ];

        $response = $this->putJson("/api/treino/{$response['id']}", $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('treinos', $data);
    }
}
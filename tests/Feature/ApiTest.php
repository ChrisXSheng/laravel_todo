<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    protected function createUser()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $token = $user->createToken('TestToken')->plainTextToken;

        return $user;
    }

    /** @test */
    public function user_can_register()
    {
        $response = $this->withoutMiddleware()->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);
    }

    /** @test */
    public function user_can_login()
    {
        $user = $this->createUser();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['access_token']);
    }

    // 添加更多测试用例...

    /** @test */
    public function user_can_create_todo()
    {
        $user = $this->createUser();
        $token = $user->createToken('TestToken')->accessToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/todos', [
            'title' => 'Test Todo',
            'description' => 'This is a test todo.',
        ]);

        $response->assertStatus(201)
            ->assertJson(['title' => 'Test Todo']);
    }

    // 添加更多测试用例...
}

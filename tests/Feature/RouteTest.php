<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->withHeaders([
            'Authorization' => getenv('API_KEY'),
        ])->get('/api/questions');

        $response->assertStatus(200);
    }

    /**
     * Test POST REQUEST
     */
    public function testPost()
    {
        $response = $this->withHeaders([
            'Authorization' => getenv('API_KEY'),
        ])->post('/api/questions', ['name' => 'test']);

        $response->assertStatus(201);
    }
}

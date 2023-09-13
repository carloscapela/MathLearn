<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_home_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_api(): void
    {
        $response = $this->getJson('/');

        $response->assertJson([
            'name' => 'mathlearn',
            'description' => 'Mathlearn Version 01',
        ]);
    }
}

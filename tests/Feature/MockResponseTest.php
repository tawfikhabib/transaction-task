<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MockResponseTest extends TestCase
{
    /** @test */
    public function returns_successful_when_header_set_to_accepted()
    {
        $response = $this->get('/api/mock-response', ['X-Mock-Status' => 'accepted']);

        $response->assertStatus(200)
                 ->assertJson(['status' => 'accepted']);
    }

    /** @test */
    public function returns_failed_when_header_set_to_failed()
    {
        $response = $this->get('/api/mock-response', ['X-Mock-Status' => 'failed']);

        $response->assertStatus(200)
                 ->assertJson(['status' => 'failed']);
    }
}


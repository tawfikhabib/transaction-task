<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentProcessingTest extends TestCase
{
    /** @test */
    public function stores_transaction_and_returns_transaction_id()
    {
        $payload = [
            'userId' => 1,
            'amount' => 100,
        ];

        $response = $this->postJson('/api/payment', $payload);

        $response->assertStatus(200)
                 ->assertJsonStructure(['transaction_id']);
    }
}

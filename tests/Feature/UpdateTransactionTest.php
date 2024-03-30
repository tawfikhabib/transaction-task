<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTransactionTest extends TestCase
{
    /** @test */
    public function updates_transaction_status()
    {
        $payload = [
            'transId' => '6607f85aca1f4',
            'status' => 'completed',
        ];

        $response = $this->putJson("/api/update-transaction", $payload);

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Transaction updated successfully']);
    }

    /** @test */
    public function returns_error_if_transaction_id_not_found()
    {
        $payload = [
            'transId' => '6607f85aca1f5',
            'status' => 'completed',
        ];

        $response = $this->putJson("/api/update-transaction", $payload);

        $response->assertStatus(404)
                 ->assertJson(['error' => 'Transaction not found']);
    }
}


<?php

namespace Tests\Feature\Controllers\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test content type
     */
    public function testContentType(): void
    {
        $response = $this->post('/api/menus/1', []);

        $response->assertStatus(406);
    }
}

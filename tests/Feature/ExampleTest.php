<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_application_returns_successful_message()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_contains_word()
    {
        $response = $this->get('/');

        $response->assertSee('Hari');

        $response->assertStatus(200);
    }
}

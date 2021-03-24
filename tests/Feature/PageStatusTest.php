<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageStatusTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Show login page
     *
     * @return void
     */
    public function testShowLoginPage()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Show register page
     *
     * @return void
     */
    public function testShowRegisterPage()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}

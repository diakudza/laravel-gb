<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GbTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_main()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_news()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
    }
    public function test_feedback()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }
    public function test_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_admin()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    public function test_admin_news()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }

}
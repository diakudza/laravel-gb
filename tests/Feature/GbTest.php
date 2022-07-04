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
        $response = $this->get('/feedbacks');
        $response->assertStatus(200);
    }
    public function test_about()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }


}

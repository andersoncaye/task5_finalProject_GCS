<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function return_view_page_list_users()
    {
        $response = $this->get('/usuario');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_route()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    public function test_create()
    {
       $user = User::create([
           'email' => 'asa@ddd.com',
           'name' => 'a@ddd.com',
       ]);

       $this->assertEquals($user->name, 'a@ddd.com');
    }
}

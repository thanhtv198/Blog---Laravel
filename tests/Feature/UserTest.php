<?php

namespace Tests\Feature;

use App\Models\User;
use App\Repositories\UserRepositoryEloquent;
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
        $response = $this->call('GET', 'login');
        $this->assertEquals(200, $response->status());
    }

    public function tes_create()
    {
        $data = [
            'name' => "aaaa",
            'email' => 'a1@gmail.2',
            'password' => '123456',
        ];

        $carouselRepo = new UserRepositoryEloquent();
        $carousel = $carouselRepo->create($data);

        $this->assertInstanceOf(Carousel::class, $carousel);
        $this->assertEquals($data['name'], $carousel->title);
        $this->assertEquals($data['email'], $carousel->link);
        $this->assertEquals($data['pasord'], $carousel->src);

    }
}

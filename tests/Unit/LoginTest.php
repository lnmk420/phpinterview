<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_showLoginForm()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)
                 ->assertViewIs('login');
    }

    public function test_login_failure()
    {
        $data = [
            'phone_number' => $this->faker->phoneNumber(),
            'password' => $this->faker->password(),
        ];

        $response = $this->post('/login', $data);

        $response->assertStatus(302)
                 ->assertSessionHasErrors(['phone_number']);
        
        $this->assertGuest();
    }

}
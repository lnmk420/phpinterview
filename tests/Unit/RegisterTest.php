<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function test_user_can_register()
    {
        $data = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0114163400',
            'password' => 'kenyampya420!M',
            'password_confirmation' => 'kenyampya420!M',
        ];

        $response = $this->post('/register', $data);

        $response->assertRedirect('/login');

        $this->assertDatabaseHas('users', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0114163400',
        ]);

        $user = User::where('phone_number', '0114163400')->first();

        $this->assertTrue(Hash::check('kenyampya420!M', $user->password));
        
    }

    /** @test */
    public function test_user_cannot_register_with_invalid_data()
    {
        $data = [
            'first_name' => '',
            'last_name' => '',
            'phone_number' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors([
            'first_name', 'last_name', 'phone_number', 'password'
        ]);

        $this->assertDatabaseMissing('users', [
            'phone_number' => ''
        ]);
    }

}

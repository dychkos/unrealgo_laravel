<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * User can register.
     *
     * @return void
     */
    public function test_user_registration()
    {
        $credentials = [
            'email' => 'unreal@go.top',
            'name' => 'Aimee Belmontez',
            'password' => Hash::make('p@ssw0rd123')
        ];

        $user = User::factory()->count(1)->make();
        $user->create($credentials);

        $response->assertStatus(200);
    }
}

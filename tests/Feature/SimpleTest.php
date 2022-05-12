<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SimpleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $create = User::create([
            'name' => 'alif irhas',
            'username' => 'alif',
            'email' => 'da@go.com',
            'password' => Hash::make('password'),
        ]);

        if (!$create) {
            $this->assertTrue(false);
        }

        $this->assertTrue(true);
    }
}

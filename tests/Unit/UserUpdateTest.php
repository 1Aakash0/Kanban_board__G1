<?php
# test/Feature/UserUpdateTest.php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserUpdateTest extends TestCase
{
  
    public function testUpdateProduct()
    {
            $response = $this->json('GET', '/api/user');
            $response->assertStatus(200);

            $product = $response->getData()[0];

            $user = factory(\App\User::class)->create();
            $update = $this->actingAs($user, 'api')->json('PATCH', '/api/products/'.$product->id,['name' => "Changed for test"]);
            $update->assertStatus(200);
            $update->assertJson(['message' => "User Updated!"]);
        } 
   
}


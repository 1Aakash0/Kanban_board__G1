
<?php
# test/Feature/getAllUserTest.php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getAllUserTest extends TestCase
{
    public function testGettingAllProducts()
    {
            $response = $this->json('GET', '/api/user');
            $response->assertStatus(200);

            $response->assertJsonStructure(
                [
                    [
                            'id',
                            'name',
                            'description',
                            'units',
                            'price',
                            'image',
                            'created_at',
                            'updated_at'
                    ]
                ]
            );
        }
   
}

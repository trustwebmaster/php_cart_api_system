<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_view_their_own_cart()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $cart = Cart::factory()->count(10)->create([
            'user_id' => $user['id']
        ]);

        $this->actingAs($user)->get('api/cart')->assertStatus(200);

    }

    public function test_user_can_add_cart()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $cart = Cart::factory()->make()->toArray();

        $this->actingAs($user)->post('api/cart' , $cart)->assertStatus(201);
    }

    public function test_user_can_update_their_own_cart()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $oldCart = Cart::factory()->create([
            'user_id' => $user->id
        ])->toArray();

        $this->assertDatabaseHas('carts', ['product_identifier' => $oldCart['product_identifier']]);

        $newCart = Cart::factory()->make(['user_id' => $user['id']])->toArray();

        $this->actingAs($user)->patch('api/cart/'.$oldCart['id'] , $newCart)->assertStatus(200);

        $this->assertEquals($oldCart['user_id']  , $newCart['user_id']);

        $this->assertDatabaseHas('carts', ['product_identifier' => $newCart['product_identifier']]);


    }

    public function test_user_can_delete_own_cart()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $cart = Cart::factory()->create([
            'user_id' => $user->id
        ])->toArray();

        $this->assertDatabaseHas('carts', ['product_identifier' => $cart['product_identifier']]);


        $this->actingAs($user)->delete('api/cart/'.$cart['id'])->assertStatus(204);


        $this->assertDatabaseMissing('carts', ['product_identifier' => $cart['product_identifier']]);
    }

//    public function test_user_can_not_update_others_cart()
//    {
//        $this->withoutExceptionHandling();
//
//        $user = User::factory()->create();
//
//        $oldCart = Cart::factory()->create([
//            'user_id' => $user->id
//        ])->toArray();
//
//        $this->assertDatabaseHas('carts', ['product_identifier' => $oldCart['product_identifier']]);
//
//        $newCart = Cart::factory()->make()->toArray();
//
//        $this->actingAs($user)->patch('api/cart/'.$oldCart['id'] , $newCart)->assertStatus(403);
//
//        $this->assertDatabaseMissing('carts', ['product_identifier' => $newCart['product_identifier']]);
//    }

}

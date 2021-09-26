<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_add_cart()
    {
        $user = User::factory()->create();
        $cart = Cart::factory()->make()->toArray();

        $this->actingAs($user)->post('/cart' , $cart);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $carts = auth()->user()->carts;

        return CartResource::collection($carts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CartRequest $request)
    {
        $cart = auth()->user()->carts()->create($request->validated());

        return response()
            ->json([
                'message' => 'Cart Added successfully',
                'data' => new CartResource($cart)
            ] , 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Cart $cart)
    {
        $this->authorize('view', $cart);

        if ($cart) {
            return response()->json([
                'data' => new CartResource($cart)
            ], 200);

        }

        return response()->json([
            'message' => 'The Cart you provided does not match the Cart',
        ], 400);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CartRequest $request, Cart $cart)
    {

        $this->authorize('update' , $cart);

        $cart->update($request->validated());

        return response()->json([
            'message' => 'Cart Updated',
            'data' => new CartResource($cart)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy(Cart $cart)
    {
        $this->authorize('delete' , $cart);

        $cart->delete();

        return response()->json([
            'message' => 'Cart Deleted',
            'data' => new CartResource($cart)
        ], 204);

    }


}

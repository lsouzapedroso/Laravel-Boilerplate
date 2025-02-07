<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ShowProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $product = Product::all();
            return response()->json([
                'Products: ', $product
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(
                [
                    'response' => 'error', $e->getMessage(),
                    'erro' => $e->getMessage(),
                ], 500
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $product)
    {
        try {
            $data = $product->validated();

            $productCreated = Product::create($data);
            return response()->json([
                'Created: ', $productCreated
            ], 201);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(
                [
                    'response' => 'error', $e->getMessage(),
                    'erro' => $e->getMessage(),
                ], 500
            );
        }
    }

    /**
     * Display the specified resource. VER
     */
    public function show(ShowProductRequest $id_product, string $id)
    {
        try {
            $id = $id_product->validated();
            $product = Product::findOrFaild($id);
            return response()->json([
                'Products: ', $product
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(
                [
                    'response' => 'error', $e->getMessage(),
                    'erro' => $e->getMessage(),
                ], 500
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        try {

            $productId = Route::current()->parameter('id_product', $id);
            $product = Product::query()->where('id', $productId)->firstOrFail();

            if (empty($product)) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            $productData = array_filter([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'stock_quantity' => $request->input('stock_quantity'),
                ], fn ($value) => ! is_null($value));
            $product->fill($productData);
            if (! $productData->isDirty()) {
                return response()->json([
                    'message' => 'Nenhuma alteração foi feita no paciente.',
                ], 200);
            }
            $product->save();

            return response()->json([
                'Products: ', $product
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(
                [
                    'response' => 'error', $e->getMessage(),
                    'erro' => $e->getMessage(),
                ], 500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::all();
            return response()->json([
                'Products: ', $product
            ], 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(
                [
                    'response' => 'error', $e->getMessage(),
                    'erro' => $e->getMessage(),
                ], 500
            );
        }
    }
}

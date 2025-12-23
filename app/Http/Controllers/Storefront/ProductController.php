<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function show(Product $product): Response
    {
        abort_unless($product->is_active, 404);

        return Inertia::render('public/ProductDetail', [
            'product' => new ProductResource($product),
        ]);
    }
}


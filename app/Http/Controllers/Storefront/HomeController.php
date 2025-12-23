<?php

namespace App\Http\Controllers\Storefront;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $products = Product::query()
            ->where('is_active', true)
            ->latest()
            ->get();

        return Inertia::render('public/Home', [
            // kirim semua produk aktif ke beranda sebagai katalog
            'featuredProducts' => ProductResource::collection($products)->resolve(),
        ]);
    }
}


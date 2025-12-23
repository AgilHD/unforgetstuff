<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('admin/Dashboard', [
            'stats' => [
                'products' => Product::count(),
                'activeProducts' => Product::where('is_active', true)->count(),
                'users' => User::count(),
            ],
        ]);
    }
}


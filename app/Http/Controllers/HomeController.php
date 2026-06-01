<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        $products = $query
            ->with([
                'images',
                'category',
                'city'
            ])
            ->latest()
            ->paginate(12);

        $categories = Category::all();

        return view('home', compact(
            'products',
            'categories'
        ));
    }
}
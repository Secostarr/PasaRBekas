<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with([
            'category',
            'city',
            'images'
        ])->latest()->get();

        return view('products.index', compact('products'));
    }

    public function myProducts()
    {
        $products = Product::with([
            'images',
            'category',
            'city'
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

        return view(
            'products.my-products',
            compact('products')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();

        return view('products.create', compact(
            'categories',
            'cities'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'city_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'condition' => 'required',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $product = Product::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'description' => $request->description,
            'price' => $request->price,
            'condition' => $request->condition,
            'status' => 'tersedia',
            'views' => 0,
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $index => $image) {

                $path = $image->store(
                    'products',
                    'public'
                );

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0
                ]);
            }
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::with([
            'category',
            'city',
            'images',
            'user'
        ])->where('slug', $slug)
        ->firstOrFail();

        $product->increment('views');
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::all();
        $cities = City::all();

        return view(
            'products.edit',
            compact(
                'product',
                'categories',
                'cities'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'city_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'condition' => 'required',
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'city_id' => $request->city_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'condition' => $request->condition,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::with('images')->findOrFail($id);

        if ($product->user_id !== Auth::id()) {
            abort(403);
        }

        foreach ($product->images as $image) {
            Storage::disk('public')
                ->delete($image->image_path);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}

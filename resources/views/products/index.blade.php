<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold">
            Marketplace PasarBekas
        </h2>
    </x-slot>

```
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Semua Produk</h3>

        <a href="{{ route('products.create') }}"
            class="btn btn-primary">
            + Jual Barang
        </a>
    </div>

    <div class="row">

        @forelse($products as $product)

            <div class="col-md-3 mb-4">

                <div class="card h-100 shadow-sm">

                    @if($product->images->count())

                        <img
                            src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                            class="card-img-top"
                            style="height:220px; object-fit:cover;"
                        >

                    @else

                        <img
                            src="https://via.placeholder.com/400x300"
                            class="card-img-top"
                        >

                    @endif

                    <div class="card-body">

                        <h5 class="card-title">
                            {{ Str::limit($product->title, 30) }}
                        </h5>

                        <h4 class="text-success fw-bold">
                            Rp {{ number_format($product->price,0,',','.') }}
                        </h4>

                        <p class="text-muted mb-1">
                            {{ $product->category->name }}
                        </p>

                        <p class="text-muted">
                            {{ $product->city->name }}
                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a
                            href="{{ route('products.show', $product->slug) }}"
                            class="btn btn-outline-primary w-100"
                        >
                            Lihat Detail
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info">
                    Belum ada produk tersedia.
                </div>

            </div>

        @endforelse

    </div>

</div>
```

</x-app-layout>

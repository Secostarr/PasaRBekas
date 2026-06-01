<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold">
            Produk Saya
        </h2>
    </x-slot>

```
<div class="container py-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        @forelse($products as $product)

            <div class="col-md-4 col-lg-3 mb-4">

                <div class="card shadow-sm h-100 border-0">

                    @if($product->images->count())

                        <img
                            src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                            class="card-img-top"
                            style="height:220px; object-fit:cover;"
                            alt="{{ $product->title }}"
                        >

                    @endif

                    <div class="card-body">

                        <h5 class="card-title">
                            <a
                                href="{{ route('products.show', $product->slug) }}"
                                class="text-decoration-none text-dark"
                            >
                                {{ $product->title }}
                            </a>
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

                        <div class="d-grid gap-2">

                            <a
                                href="{{ route('products.edit', $product->id) }}"
                                class="btn btn-warning"
                            >
                                Edit Produk
                            </a>

                            <form
                                action="{{ route('products.destroy', $product->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger w-100"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                >
                                    Hapus Produk
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info">
                    Anda belum memiliki produk.
                </div>
            </div>

        @endforelse

    </div>

</div>
```

</x-app-layout>
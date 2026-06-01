<x-app-layout>

    <div class="container py-4">

        <h1 class="mb-4">
            PasarBekas
        </h1>

        <form method="GET" action="/">
            <div class="input-group mb-4">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari barang..."
                >

                <button
                    class="btn btn-primary"
                    type="submit"
                >
                    Cari
                </button>
            </div>
        </form>

        <div class="row">

            @foreach($products as $product)

                <div class="col-md-3 mb-4">

                    <div class="card h-100">

                        @if($product->images->count())
                            <img
                                src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                                class="card-img-top"
                                style="height:200px; object-fit:cover;"
                            >
                        @endif

                        <div class="card-body">

                            <h5 class="card-title">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    {{ $product->title }}
                                </a>
                            </h5>

                            <h6 class="text-success">
                                Rp {{ number_format($product->price) }}
                            </h6>

                            <small>
                                {{ $product->city->name }}
                            </small>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{ $products->links() }}

    </div>

</x-app-layout>
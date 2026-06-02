<x-app-layout>

```
<x-slot name="header">
    <h2 class="fw-bold">
        Detail Produk
    </h2>
</x-slot>

<div class="container py-4">

    <div class="row">

        {{-- FOTO PRODUK --}}
        <div class="col-lg-6 mb-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    @if($product->images->count())

                        <img
                            src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                            alt="{{ $product->title }}"
                            class="img-fluid rounded"
                            style="max-height:500px"
                        >

                    @else

                        <div class="alert alert-warning">
                            Tidak ada foto produk.
                        </div>

                    @endif

                </div>

            </div>

        </div>

        {{-- DETAIL PRODUK --}}
        <div class="col-lg-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h1 class="fw-bold mb-3">
                        {{ $product->title }}
                    </h1>

                    <h2 class="text-success fw-bold mb-4">
                        Rp {{ number_format($product->price,0,',','.') }}
                    </h2>

                    <div class="mb-4">

                        <span class="badge bg-primary">
                            {{ $product->category->name }}
                        </span>

                        <span class="badge bg-success">
                            {{ ucfirst(str_replace('_',' ', $product->condition)) }}
                        </span>

                    </div>

                    <table class="table">

                        <tr>
                            <th width="150">
                                Kota
                            </th>
                            <td>
                                {{ $product->city->name }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Penjual
                            </th>
                            <td>
                                {{ $product->user->name }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Dilihat
                            </th>
                            <td>
                                👁️ {{ $product->views }} kali
                            </td>
                        </tr>

                    </table>
                    
                    @auth
                        @if(auth()->id() != $product->user_id)
                            <div class="d-grid gap-2">
                                <form
                                    action="{{ route('chat.start', $product->id) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn btn-success btn-lg w-100"
                                    >
                                        💬 Chat Penjual
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-info text-center mb-0">
                                📦 Ini adalah produk Anda sendiri.
                            </div>
                        @endif
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-success btn-lg w-100"
                        >
                            Login untuk Chat Penjual
                        </a>
                    @endauth
                </div>

            </div>

            {{-- PENJUAL --}}
            <div class="card shadow border-0 mt-4">

                <div class="card-body">

                    <h5 class="fw-bold">
                        Informasi Penjual
                    </h5>

                    <hr>

                    <p>
                        <strong>👤 Nama:</strong>
                        {{ $product->user->name }}
                    </p>

                    <p>
                        <strong>📦 Total Produk:</strong>
                        {{ $product->user->products()->count() }}
                    </p>

                    <p>
                        <strong>📅 Bergabung Pada:</strong>
                        {{ $product->user->created_at->format('d M Y') }}
                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- DESKRIPSI --}}
    <div class="card shadow border-0 mt-4">

        <div class="card-body">

            <h4 class="fw-bold">
                Deskripsi Produk
            </h4>

            <hr>

            <p class="mb-0">
                {{ $product->description }}
            </p>

        </div>

    </div>

</div>
```

</x-app-layout>
<x-app-layout>

```
<x-slot name="header">
    <h2 class="fw-bold">
        👤 Profil Saya
    </h2>
</x-slot>

<div class="container py-4">

    <div class="row">

        <div class="col-lg-4 mb-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <div
                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-3"
                        style="width:100px;height:100px;font-size:40px;"
                    >
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <h4>
                        {{ Auth::user()->name }}
                    </h4>

                    <p class="text-muted">
                        {{ Auth::user()->email }}
                    </p>

                    <hr>

                    <p class="mb-0">
                        Bergabung sejak
                        {{ Auth::user()->created_at->format('d M Y') }}
                    </p>

                    <hr>

                    <h6 class="fw-bold">
                        Statistik
                    </h6>

                    <p>
                        📦 Produk:
                        {{ Auth::user()->products()->count() }}
                    </p>

                    <p>
                        👁️ Total View:
                        {{ Auth::user()->products()->sum('views') }}
                    </p>

                </div>

                <div class="card shadow border-0 mt-4">

                    <div class="card-header bg-success text-white">
                        📦 Produk Yang Saya Jual
                    </div>

                    <div class="card-body">

                        @forelse($products as $product)

                            <div class="mb-3">

                                <strong>
                                    {{ $product->title }}
                                </strong>

                                <br>

                                <small class="text-muted">
                                    Rp {{ number_format($product->price,0,',','.') }}
                                </small>

                                <hr>

                            </div>

                        @empty

                            <p class="text-muted">
                                Belum ada produk.
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-primary text-white">
                    ✏️ Informasi Profil
                </div>

                <div class="card-body">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>

            <div class="card shadow border-0 mb-4">

                <div class="card-header bg-warning">
                    🔒 Ubah Password
                </div>

                <div class="card-body">

                    @include('profile.partials.update-password-form')

                </div>

            </div>

            <div class="card shadow border-0">

                <div class="card-header bg-danger text-white">
                    ⚠️ Hapus Akun
                </div>

                <div class="card-body">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>

        </div>

    </div>

</div>
```

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold fs-3">
            Dashboard PasarBekas
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body text-center">

                        <h5 class="card-title">
                            Produk Saya
                        </h5>

                        <h1 class="display-4">
                            📦
                        </h1>

                        <p>
                            Kelola produk yang Anda jual
                        </p>

                        <a
                            href="{{ route('products.my') }}"
                            class="btn btn-primary"
                        >
                            Lihat Produk
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            Tambah Produk
                        </h5>
                        <h1 class="display-4">
                            ➕
                        </h1>

                        <p>
                            Jual barang bekas Anda
                        </p>
                        <a
                            href="{{ route('products.create') }}"
                            class="btn btn-success"
                        >
                            Tambah Barang
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            Marketplace
                        </h5>
                        <h1 class="display-4">
                            🛒
                        </h1>

                        <p>
                            Jelajahi semua produk
                        </p>

                        <a
                            href="{{ route('products.index') }}"
                            class="btn btn-warning"
                        >
                            Jelajahi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mt-5">
            <div class="card-body">
                <h4>
                    Selamat Datang di PasarBekas 👋
                </h4>
                <p class="text-muted">
                    Platform jual beli barang bekas yang mudah dan aman.
                </p>
            </div>
        </div>

    </div>
</x-app-layout>
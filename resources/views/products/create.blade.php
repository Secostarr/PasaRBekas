<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Jual Barang Bekas
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    📦 Jual Barang Bekas
                </h4>
            </div>

            <div class="card-body">

                <form
                    action="{{ route('products.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

            <div class="mb-3">
                <label class="form-label">
                    Nama Barang
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    placeholder="Contoh: Laptop ASUS Vivobook"
                    required
                >
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required
                    >
                        <option value="">
                            Pilih Kategori
                        </option>

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Kota
                    </label>

                    <select
                        name="city_id"
                        class="form-select"
                        required
                    >
                        <option value="">
                            Pilih Kota
                        </option>

                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Harga (Rp)
                    </label>

                    <input
                        type="number"
                        name="price"
                        class="form-control"
                        placeholder="500000"
                        required
                    >

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Kondisi
                    </label>

                    <select
                        name="condition"
                        class="form-select"
                        required
                    >
                        <option value="baru">Baru</option>
                        <option value="seperti_baru">Seperti Baru</option>
                        <option value="baik">Baik</option>
                        <option value="cukup">Cukup</option>
                        <option value="rusak_ringan">Rusak Ringan</option>
                    </select>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi Produk
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="form-control"
                    placeholder="Jelaskan kondisi barang secara detail..."
                    required
                ></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Foto Produk
                </label>

                <input
                    type="file"
                    name="images[]"
                    class="form-control"
                    multiple
                >

                <small class="text-muted">
                    Upload beberapa foto agar produk lebih menarik.
                </small>

            </div>

            <div class="text-end">

                <button
                    type="submit"
                    class="btn btn-primary btn-lg"
                >
                    🚀 Publikasikan Produk
                </button>

            </div>

        </form>

            </div>

        </div>

    </div>

</x-app-layout>
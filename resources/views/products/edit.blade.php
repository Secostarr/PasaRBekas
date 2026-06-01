<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            ✏️ Edit Produk
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow border-0">

            <div class="card-header bg-warning">
                <h4 class="mb-0 text-dark">
                    Edit Produk
                </h4>
            </div>

            <div class="card-body">

                <form
                    action="{{ route('products.update', $product->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')

                    {{-- Nama Barang --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Nama Barang
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ $product->title }}"
                            class="form-control"
                            required
                        >

                    </div>

                    <div class="row">

                        {{-- Kategori --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                class="form-select"
                                required
                            >
                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        @selected($product->category_id == $category->id)
                                    >
                                        {{ $category->name }}
                                    </option>

                                @endforeach
                            </select>

                        </div>

                        {{-- Kota --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kota
                            </label>

                            <select
                                name="city_id"
                                class="form-select"
                                required
                            >
                                @foreach($cities as $city)

                                    <option
                                        value="{{ $city->id }}"
                                        @selected($product->city_id == $city->id)
                                    >
                                        {{ $city->name }}
                                    </option>

                                @endforeach
                            </select>

                        </div>

                    </div>

                    <div class="row">

                        {{-- Harga --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Harga (Rp)
                            </label>

                            <input
                                type="number"
                                name="price"
                                value="{{ $product->price }}"
                                class="form-control"
                                required
                            >

                        </div>

                        {{-- Kondisi --}}
                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Kondisi
                            </label>

                            <select
                                name="condition"
                                class="form-select"
                                required
                            >
                                <option value="baru" @selected($product->condition == 'baru')>
                                    Baru
                                </option>

                                <option value="seperti_baru" @selected($product->condition == 'seperti_baru')>
                                    Seperti Baru
                                </option>

                                <option value="baik" @selected($product->condition == 'baik')>
                                    Baik
                                </option>

                                <option value="cukup" @selected($product->condition == 'cukup')>
                                    Cukup
                                </option>

                                <option value="rusak_ringan" @selected($product->condition == 'rusak_ringan')>
                                    Rusak Ringan
                                </option>
                            </select>

                        </div>

                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi Produk
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="form-control"
                            required
                        >{{ $product->description }}</textarea>

                    </div>

                    {{-- Foto Lama --}}
                    <div class="mb-4">

                        <label class="form-label">
                            Foto Saat Ini
                        </label>

                        @if($product->images->count())

                            <div class="mb-3">

                                <img
                                    src="{{ asset('storage/'.$product->images->first()->image_path) }}"
                                    alt="{{ $product->title }}"
                                    class="img-fluid rounded shadow"
                                    style="max-height:250px"
                                >

                            </div>

                        @else

                            <div class="alert alert-warning">
                                Produk belum memiliki foto.
                            </div>

                        @endif

                    </div>

                    {{-- Upload Foto Baru --}}
                    <div class="mb-4">

                        <label class="form-label">
                            Ganti Foto Produk
                        </label>

                        <input
                            type="file"
                            name="images[]"
                            multiple
                            class="form-control"
                        >

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>

                    </div>

                    <div class="text-end">

                        <button
                            type="submit"
                            class="btn btn-warning btn-lg"
                        >
                            💾 Update Produk
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
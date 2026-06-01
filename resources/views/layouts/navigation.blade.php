<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex justify-between h-16">
            {{-- Logo --}}
            <div class="flex items-center">
                <a href="{{ url('/') }}"
                   class="text-decoration-none fw-bold fs-4 text-primary">
                    🛒 PasarBekas
                </a>

                {{-- Menu --}}
                <div class="hidden sm:flex sm:items-center sm:ms-10 gap-4">

                    <a href="{{ url('/') }}"
                       class="text-decoration-none text-dark fw-semibold">
                        Marketplace
                    </a>

                    @auth

                        <a href="{{ route('dashboard') }}"
                           class="text-decoration-none text-dark fw-semibold">
                            Dashboard
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="text-decoration-none text-dark fw-semibold">
                            Produk Saya
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Right Menu --}}
            <div class="hidden sm:flex sm:items-center">
                @auth
                    <a
                        href="{{ route('products.create') }}"
                        class="btn btn-success btn-sm me-3"
                    >
                        + Jual Barang
                    </a>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-600 bg-white hover:text-gray-800"
                            >
                                <div class="d-flex align-items-center">

                                    <div
                                        class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                                        style="width:35px;height:35px;"
                                    >
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>

                                    <span>
                                        {{ Auth::user()->name }}
                                    </span>

                                </div>
                                <div class="ms-2">
                                    ▼
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link
                                :href="route('profile.edit')"
                            >
                                👤 Profile
                            </x-dropdown-link>

                            <form
                                method="POST"
                                action="{{ route('logout') }}"
                            >
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    🚪 Logout
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="d-flex gap-2">

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-outline-primary"
                        >
                            Login
                        </a>

                        <a
                            href="{{ route('register') }}"
                            class="btn btn-primary"
                        >
                            Daftar
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
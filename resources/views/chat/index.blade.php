<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            💬 Percakapan Saya
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="card shadow border-0">
            <div class="card-body">
                @forelse($conversations as $conversation)
                    <a
                        href="{{ route('chat.show', $conversation->id) }}"
                        class="text-decoration-none text-dark"
                    >
                        <div class="d-flex align-items-center border-bottom py-3">
                            <div
                                class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3"
                                style="width:50px;height:50px;"
                            >
                                {{ strtoupper(substr($conversation->product->title,0,1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="mb-1">
                                    {{ $conversation->product->title }}
                                </h5>
                                <small class="text-muted">
                                    @if(auth()->id() == $conversation->seller_id)

                                        Pembeli:
                                        {{ $conversation->buyer->name }}

                                    @else

                                        Penjual:
                                        {{ $conversation->seller->name }}

                                    @endif
                                </small>
                            </div>
                        </div>
                    </a>
                @empty

                    <div class="text-center py-5">
                        <h5>
                            Belum ada percakapan
                        </h5>
                        <p class="text-muted">
                            Mulai chat dari halaman produk.
                        </p>
                    </div>

                @endforelse

            </div>
        </div>
    </div>

</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            💬 Chat Penjual
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="card shadow border-0">

            {{-- Header Chat --}}
            <div class="card-header bg-primary text-white">

                <div class="d-flex align-items-center justify-content-between">

                    <div>

                        <h5 class="mb-0">
                            {{ $conversation->product->title }}
                        </h5>

                        <small>
                            Penjual:
                            {{ $conversation->seller->name }}
                        </small>

                    </div>

                </div>

            </div>

            {{-- Isi Chat --}}
            <div
                class="card-body"
                style="
                    height:500px;
                    overflow-y:auto;
                    background:#f8f9fa;
                "
            >

                @forelse($messages as $message)

                    <div
                        class="mb-3
                        {{
                            $message->sender_id == auth()->id()
                            ? 'text-end'
                            : 'text-start'
                        }}"
                    >

                        <div
                            class="d-inline-block p-3 rounded shadow-sm
                            {{
                                $message->sender_id == auth()->id()
                                ? 'bg-primary text-white'
                                : 'bg-white'
                            }}"
                            style="max-width:70%;"
                        >

                            <div class="small fw-bold mb-1">
                                {{ $message->sender->name }}
                            </div>

                            {{ $message->message }}

                        </div>

                    </div>

                @empty

                    <div class="text-center text-muted mt-5">

                        <h5>
                            Belum ada pesan
                        </h5>

                        <p>
                            Mulai percakapan dengan penjual.
                        </p>

                    </div>

                @endforelse

            </div>

            {{-- Form Kirim --}}
            <div class="card-footer">

                <form
                    action="{{ route('chat.send', $conversation->id) }}"
                    method="POST"
                >
                    @csrf

                    <div class="input-group">

                        <input
                            type="text"
                            name="message"
                            class="form-control"
                            placeholder="Tulis pesan..."
                            required
                        >

                        <button
                            type="submit"
                            class="btn btn-success"
                        >
                            Kirim
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
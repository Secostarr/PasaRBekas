<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $conversations = Conversation::with([
            'product',
            'buyer',
            'seller'
        ])
        ->where('buyer_id', Auth::id())
        ->orWhere('seller_id', Auth::id())
        ->latest()
        ->get();

        return view(
            'chat.index',
            compact('conversations')
        );
    }

    public function start (Product $product)
    {
        if ($product->user_id == Auth::id()) {

            return back()
                ->with(
                    'error',
                    'Tidak bisa chat produk sendiri.'
                );
        }

        $conversation = Conversation::firstOrCreate(
            [
                'product_id' => $product->id,
                'buyer_id' => Auth::id(),
                'seller_id' => $product->user_id,
            ]
        );

        return redirect()->route(
            'chat.show',
            $conversation
        );
    }

    public function show (Conversation $conversation)
    {
        $messages = $conversation
            ->messages()
            ->with('sender')
            ->latest()
            ->get()
            ->reverse();

        return view(
            'chat.show',
            compact(
                'conversation',
                'messages'
            )
        );
    }

    public function send(Request $request,Conversation $conversation)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'conversation_id' =>
                $conversation->id,

            'sender_id' =>
                Auth::id(),

            'message' =>
                $request->message,
        ]);

        return back();
    }

    
}

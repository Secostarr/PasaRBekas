<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('city_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('description');

            $table->decimal('price', 15, 2);

            $table->enum('condition', [
                'baru',
                'seperti_baru',
                'baik',
                'cukup',
                'rusak_ringan'
            ]);

            $table->text('address')->nullable();

            $table->enum('status', [
                'tersedia',
                'dipesan',
                'terjual'
            ])->default('tersedia');

            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

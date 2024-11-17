<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->enum('currency', ['ETH', 'USDT']);
            $table->enum('media_format', ['jpeg', 'jpg', 'png', 'mp4']);
            $table->string('media_url');
            $table->string('name');
            $table->decimal('price');
            $table->enum('type', ['image', 'video']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};

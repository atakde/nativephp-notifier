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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('guid')->unique();
            $table->string('link')->unique();
            $table->string('title');
            $table->string('creator');
            $table->string('category');
            $table->boolean('is_viewed')->default(false);
            $table->string('pubDateAgo')->nullable();
            $table->timestamp('pubDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

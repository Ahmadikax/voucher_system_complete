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
        Schema::create('code_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_code_id')->constrained('product_codes')->onDelete('cascade');
            $table->string('action');
            $table->text('note')->nullable();
            $table->timestamp('logged_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_logs');
    }
};
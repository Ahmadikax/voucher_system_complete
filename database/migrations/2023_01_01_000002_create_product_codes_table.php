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
        Schema::create('product_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->text('code');
            $table->text('description')->nullable();
            $table->enum('status', ['available', 'sold', 'reserved'])->default('available');
            $table->date('expires_at')->nullable();
            $table->timestamp('sold_at')->nullable();
            $table->timestamp('last_modified_at')->nullable();
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->string('code_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_codes');
    }
};
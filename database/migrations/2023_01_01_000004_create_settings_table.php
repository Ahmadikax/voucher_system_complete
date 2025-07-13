<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value');
            $table->timestamps();
        });

        // Insert default settings
        DB::table('settings')->insert([
            ['key' => 'low_stock_threshold', 'value' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'allowed_file_types', 'value' => 'csv,txt', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'code_masking', 'value' => 'true', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
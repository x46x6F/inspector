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
        Schema::create('compatible', function (Blueprint $table) {
            $table->foreignId('model_id')->reference('id')->on('models');
            $table->foreignId('compatible_id')->reference('id')->on('models');
            $table->primary(['model_id', 'compatible_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compatible');
    }
};

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
        Schema::create('csv_materials', function (Blueprint $table) {
            $table->integer('constructor_id');
            $table->integer('type_id');
            $table->integer('site_id');
            $table->string('piece_id');
            $table->string('model_name');
            $table->integer('creation_year');
            $table->boolean('has_electro');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csv_materials');
    }
};

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
        Schema::create('models', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->string('status');
            $table->boolean('has_electro');
            $table->integer('creation_year');
            $table->foreignId('constructor_id')->reference('id')->on('constructors');
            $table->foreignId('type_id')->reference('id')->on('types');
            $table->string('compose_id')->reference('id')->on('models')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};

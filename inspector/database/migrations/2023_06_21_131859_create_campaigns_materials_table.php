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
        Schema::create('campaigns_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->reference('id')->on('campaigns');
            $table->foreignId('material_id')->reference('id')->on('materials');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns_materials');
    }
};

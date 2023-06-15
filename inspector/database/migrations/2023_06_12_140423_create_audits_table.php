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
        Schema::create('audits', function (Blueprint $table) {
            $table->foreignId('campaign_id')->reference('id')->on('campaigns');
            $table->foreignId('piece_id')->reference('id')->on('pieces');
            $table->primary(['campaign_id', 'piece_id']);
            $table->boolean('audit');
            $table->boolean('presence');
            $table->boolean('functional');
            $table->integer('month');
            $table->boolean('usury');
            $table->boolean('change');
            $table->boolean('complement');
            $table->boolean('recommended');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};

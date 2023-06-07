<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('restricted-access.tables.links'), function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->morphs('linkable');
            $table->string('name')->nullable();
            $table->dateTime('use_pin')->nullable();
            $table->string('pin')->nullable();
            $table->json('access_configuration')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('restricted-access.tables.links'));
    }
};

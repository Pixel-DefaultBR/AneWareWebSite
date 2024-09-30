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
        if (!Schema::hasTable('reports')) {
            Schema::create('reports', function (Blueprint $table) {
                $table->id();
                $table->string('client');
                $table->string('researcher');
                $table->string('title');
                $table->text('description');
                $table->string('vulnerability_type');
                $table->string('severity');
                $table->string('status');
                $table->unsignedBigInteger('user_id');
                $table->string('image')->nullable();
                $table->timestamps(); // Certifique-se de ter isso
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

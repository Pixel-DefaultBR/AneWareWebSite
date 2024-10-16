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
                $table->integer('reported_for_user_id');
                $table->string('title')->nullable(false);
                $table->text('description')->nullable(false);
                $table->string('user')->nullable(false);
                $table->string('severity')->nullable(false);
                $table->string('status')->nullable(false);
                $table->string('image')->nullable(true);
                $table->timestamps();
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

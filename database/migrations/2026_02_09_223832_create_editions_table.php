<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(false);
            $table->boolean('registrations')->default(false);
            $table->integer('edition_number')->unique();
            $table->timestamps();

            $table->index('edition_number');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('editions');
    }
};

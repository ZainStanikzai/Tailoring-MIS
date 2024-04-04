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
        Schema::create('skirt_style', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clothing_id');
            $table->unsignedBigInteger('skirt_id');
            $table->string('clothing_type');

           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skirt_style');
    }
};

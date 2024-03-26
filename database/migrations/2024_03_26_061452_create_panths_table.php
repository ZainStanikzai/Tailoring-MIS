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
        Schema::create('panths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('staff_id');
            $table->smallInteger('height');
            $table->smallInteger('waist');
            $table->smallInteger('leg');
            $table->smallInteger('sourin');
            $table->integer('price');
            $table->smallInteger('qty');
            $table->integer('paid');
            $table->string('status');
            $table->string('sewStatus');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panths');
    }
};

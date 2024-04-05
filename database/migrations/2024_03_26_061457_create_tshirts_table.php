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
        Schema::create('tshirts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('staff_id');
            $table->float('height');
            $table->float('shoulder');
            $table->float('sleeve');
            $table->float('waist');
            $table->float('sideDown');
            $table->float('skirt');
            $table->float('neck');
            $table->integer('price');
            $table->smallInteger('qty');
            $table->integer('paid');
            $table->integer('balance')->default(0);
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
        Schema::dropIfExists('tshirts');
    }
};

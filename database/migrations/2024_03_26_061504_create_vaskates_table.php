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
        Schema::create('vaskates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('staff_id');
            $table->string("customer_name");
            $table->string("customer_number");
            $table->float('height');
            $table->float('shoulder');
            $table->float('side');
            $table->float('waist');
            $table->float('neck');
            $table->integer('price');
            $table->integer('rakht')->default(0);
            $table->integer('qty');
            $table->integer('paid')->default(0);
            $table->integer('balance')->default(0);
            $table->date('sewDate')->default(date('Y/m/d'));
            $table->string('status');
            $table->string('sewStatus');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaskates');
    }
};

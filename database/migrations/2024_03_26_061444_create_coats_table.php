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
        Schema::create('coats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('staff_id');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->float('height');
            $table->float('shoulder');
            $table->float('sleeve');
            $table->float('side');
            $table->float('waist');
            $table->float('sourin');
            $table->float('crossBig');
            $table->float('cross');
            $table->unsignedBigInteger('neckSubStyle_id');
            $table->unsignedBigInteger('backStyle_id');
            $table->integer('price');
            $table->smallInteger('qty');
            $table->integer('paid');
            $table->integer('rakht');
            $table->integer('balance')->default(0);
            $table->string('status');
            $table->string('sewStatus');
            $table->date('sewDate');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coats');
    }
};

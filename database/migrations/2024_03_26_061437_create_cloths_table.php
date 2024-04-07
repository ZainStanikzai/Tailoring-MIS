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
        Schema::create('cloths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('staff_id');
            $table->string("customer_name");
            $table->string("customer_number");
            $table->float('height',false,true);
            $table->float('shoulder',false,true);
            $table->float('sleeve',false,true);
            $table->float('neck',false,true);
            $table->float('side',false,true);
            $table->float('sideDown',false,true);
            $table->float('skirt',false,true);
            $table->float('tumban',false,true);
            $table->float('leg',false,true);
            $table->boolean('tumbanPocket')->default(0);
            $table->unsignedBigInteger('sidePocketStyle_id');
            $table->unsignedBigInteger('frontPocketStyle_id');
            $table->unsignedBigInteger('salayeeStyle_id');
            $table->unsignedBigInteger('buttonStyle_id');
            $table->unsignedBigInteger('sleeveMouthStyle_id');
            $table->integer('price');
            $table->integer('rakht');
            $table->smallInteger('qty');
            $table->integer('paid');
            $table->integer('balance')->default(0);
            $table->string('status');
            $table->string('sewStatus');
            $table->date('sewDate')->nullable();
            $table->string('description')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloths');
    }
};

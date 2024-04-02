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
            $table->smallInteger('height',false,true);
            $table->smallInteger('shoulder',false,true);
            $table->smallInteger('sleeve',false,true);
            $table->smallInteger('neck',false,true);
            $table->smallInteger('side',false,true);
            $table->smallInteger('sideDown',false,true);
            $table->smallInteger('skirt',false,true);
            $table->smallInteger('tumban',false,true);
            $table->smallInteger('leg',false,true);
            $table->boolean('tumbanPocket');
            $table->unsignedBigInteger('sidePocketStyle_id');
            $table->unsignedBigInteger('frontPocketStyle_id');
            $table->unsignedBigInteger('salayeeStyle_id');
            $table->unsignedBigInteger('buttonStyle_id');
            $table->unsignedBigInteger('sleeveMouthStyle_id');
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
        Schema::dropIfExists('cloths');
    }
};

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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('mark')->nullable();
            $table->string('placa')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('vehicle_type_id')->unsigned()->nullable();
            $table->timestamps();

            //add constrained in the table
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

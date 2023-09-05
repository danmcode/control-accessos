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
            $table->unsignedBigInteger('id_vehicle_type')->unsigned()->nullable();
            $table->timestamps();

            //add constrained in the table
            $table->foreign('id_vehicle_type')->references('id')->on('vehicle_types');
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

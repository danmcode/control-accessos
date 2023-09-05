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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('mark')->nullable();
            $table->string('serial')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('id_equipment_type')->unsigned()->nullable();
            $table->timestamps();

            //add constrained in the table
            $table->foreign('id_equipment_type')->references('id')->on('equipment_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};

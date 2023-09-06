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
            $table->text('description')->nullable();
            $table->unsignedBigInteger('equipment_type_id')->unsigned()->nullable();
            $table->timestamps();

            //add constrained in the table
            $table->foreign('equipment_type_id')->references('id')->on('equipment_types');
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

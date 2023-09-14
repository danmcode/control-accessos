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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();

            $table->time('time_in');
            $table->time('time_out');

            $table->unsignedBigInteger('created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('updated_by')->unsigned()->nullable();
            
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};

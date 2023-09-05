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
        Schema::create('income_exit_visitors', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time_in');
            $table->dateTime('date_time_out')->nullable();
            $table->string('observation')->nullable();

            $table->unsignedBigInteger('visitor_id')->unsigned();
            $table->unsignedBigInteger('registered_in_by')->unsigned();
            $table->unsignedBigInteger('registered_out_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('visitor_id')->references('id')->on('visitors');
            
            $table->foreign('registered_in_by')->references('id')->on('users');
            $table->foreign('registered_out_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_exit_visitors');
    }
};

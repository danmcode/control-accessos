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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_computer_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->time('deadline');
            $table->time('delivery_date');

            $table->unsignedBigInteger('created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('updated_by')->unsigned()->nullable();
            
            $table->timestamps();

            $table->foreign('loan_computer_id')->references('id')->on('loan_computers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
            $table->text('observation')->nullable();
            $table->date('date_arl')->nullable();
            $table->text('remission')->nullable();
            $table->string('company');

            $table->unsignedBigInteger('visitor_id')->unsigned();
            $table->unsignedBigInteger('visitor_type_id')->unsigned();
            $table->unsignedBigInteger('arl_id')->unsigned()->nullable();
            $table->unsignedBigInteger('equipment_id')->unsigned()->nullable();
            $table->unsignedBigInteger('vehicle_id')->unsigned()->nullable();
            $table->unsignedBigInteger('id_collaborator')->unsigned();


            $table->unsignedBigInteger('created_by')->unsigned();
            $table->unsignedBigInteger('updated_by')->unsigned()->nullable();
            $table->unsignedBigInteger('registered_in_by')->unsigned();
            $table->unsignedBigInteger('registered_out_by')->unsigned()->nullable();

            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('registered_in_by')->references('id')->on('users');
            $table->foreign('registered_out_by')->references('id')->on('users');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('equipment_id')->references('id')->on('equipments');
            $table->foreign('id_collaborator')->references('id')->on('collaborators');
            $table->foreign('visitor_type_id')->references('id')->on('visitor_types');
            $table->foreign('arl_id')->references('id')->on('arls');

            $table->timestamps();
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

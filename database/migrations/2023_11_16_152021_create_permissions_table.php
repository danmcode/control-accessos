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
        Schema::create('permissions', function (Blueprint $table) {

            $table->id();
            $table->date('date_permission');
            $table->unsignedBigInteger('collaborator_permission')->unsigned();
            $table->integer('diff_hours');
            $table->time('start_hour');
            $table->time('final_hour');
            $table->text('reason_permission')->nullable();
            $table->boolean('status_auth')->nullable();
            $table->text('observation')->nullable();
            $table->unsignedBigInteger('allowed_by')->unsigned()->nullable();
            $table->foreign('collaborator_permission')->references('id')->on('users');
            $table->foreign('allowed_by')->references('id')->on('users');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};

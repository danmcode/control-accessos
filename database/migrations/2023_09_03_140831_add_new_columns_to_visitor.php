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
        Schema::table('visitors', function (Blueprint $table) {
            //add columns for table visitor
            $table->unsignedBigInteger('identification_type')->unsigned();
            $table->string('identification', 20);
            $table->string('name');
            $table->string('photo_path')->nullable();
            $table->string('last_name');
            $table->unsignedBigInteger('visitor_type')->unsigned();
            $table->string('company');

            $table->unsignedBigInteger('arl_id')->unsigned()->nullable();
            $table->date('date_arl')->nullable();
            $table->string('remission')->nullable();
            
            $table->unsignedBigInteger('equipment_type')->unsigned()->nullable();
            $table->unsignedBigInteger('vehicle_type')->unsigned()->nullable();
            $table->unsignedBigInteger('id_collaborator')->unsigned();
            $table->unsignedBigInteger('id_user')->unsigned();


            //add constrained in the table
            $table->foreign('identification_type')->references('id')->on('identification_types');
            $table->foreign('visitor_type')->references('id')->on('visitor_types');
            $table->foreign('arl_id')->references('id')->on('arls');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        
        Schema::table('visitors', function (Blueprint $table) {
            // In case of need a migration of reverse.
            $table->dropColumn('identification_type');
            $table->dropColumn('identification');
            $table->dropColumn('name');
            $table->dropColumn('last_name');
            $table->dropColumn('visitor_type');
            $table->dropColumn('company');
            $table->dropColumn('arl_id');
            $table->dropColumn('date_arl');
            $table->dropColumn('remission');
            $table->dropColumn('equipment_type');
            $table->dropColumn('vehicle_type');
            $table->dropColumn('id_creator');
            $table->dropColumn('id_collaborator');
        });
    }
};

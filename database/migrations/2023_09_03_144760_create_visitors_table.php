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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('identification_type')->unsigned();
            $table->string('identification', 20);
            $table->string('name');
            $table->string('photo_path')->nullable();
            $table->string('last_name');
            $table->timestamps();

            $table->foreign('identification_type')->references('id')->on('identification_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};

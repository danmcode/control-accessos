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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('identification', 20);
            $table->unsignedBigInteger('identification_type')->unsigned();
            $table->string('photo_path')->nullable();
            $table->string('name');
            $table->string('last_name');

            $table->boolean('is_active')->default(true);

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->unsignedBigInteger('role_id')->unsigned();

            $table->unsignedBigInteger('created_by')->unsigned();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

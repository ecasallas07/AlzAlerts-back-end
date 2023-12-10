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
            $table->string('user_name',255)->nullable();
            $table->string('user_telephone',255)->nullable();
            $table->string('user_email',255)->nullable();   
            $table->date('user_birth_date',255)->nullable();
            $table->enum('user_status',[0,1])->comment('1 = activo /-/ 0 = Inactivo');
            $table->string('user_photo',255)->comment('Photo with url');
            $table->timestamp('email_verified_at')->nullable();
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

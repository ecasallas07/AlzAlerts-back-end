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
        //foreign key (id_users)
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name',255)->nullable();
            $table->string('account_email',255)->nullable();
            $table->string('account_password',255)->nullable();
            $table->unsignedBigInteger('user_id')->comment('foreign key of users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};

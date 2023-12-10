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
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();
            $table->string('galarie_title')->nullable();
            $table->text('galarie_description')->nullable();
            $table->string('galarie_tag')->nullable();
            $table->string('galarie_photo')->nullable();
            $table->unsignedBigInteger('user_id')->comment('foreign key of users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};

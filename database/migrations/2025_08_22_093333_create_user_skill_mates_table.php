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
        Schema::create('user_skill_mates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nickname')->unique()->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('email')->nullable();
            $table->text('bio')->nullable();
            $table->json('tags')->nullable();
            $table->string('password')->nullable();
            $table->string('profile_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_skill_mates');
    }
};

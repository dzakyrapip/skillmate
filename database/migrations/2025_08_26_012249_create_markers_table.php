<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // yang nge-bookmark
            $table->unsignedBigInteger('bookmarked_user_id'); // user yang di-bookmark
            $table->string('type')->default('skillmate');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user_skill_mates')->onDelete('cascade');
            $table->foreign('bookmarked_user_id')->references('id')->on('user_skill_mates')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
};
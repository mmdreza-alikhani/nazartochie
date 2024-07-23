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
        Schema::create('post_reaction', function (Blueprint $table) {
            $table->foreignId('reaction_id');
            $table->foreign('reaction_id')->references('id')->on('reactions')->onDelete('cascade');

            $table->foreignId('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('');

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['reaction_id' , 'post_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_reaction');
    }
};

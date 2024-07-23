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
        Schema::create('comment_reaction', function (Blueprint $table) {
            $table->foreignId('reaction_id');
            $table->foreign('reaction_id')->references('id')->on('reactions')->onDelete('cascade');

            $table->foreignId('comment_id');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['reaction_id' , 'comment_id', 'user_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_reaction');
    }
};

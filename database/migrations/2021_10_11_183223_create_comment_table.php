<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            // ispod verzije 6 se koristi ovaj stari  
            // $table->unsignedBigInteger('post_id');
            // $table->foreign('post_id')->reference('id')->on('posts')->onDelete('cascade');
            // novi nacin
            // ovo onDelete znaci kad se bude briso post iz tabele postovi brisi sve komentare za nju
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

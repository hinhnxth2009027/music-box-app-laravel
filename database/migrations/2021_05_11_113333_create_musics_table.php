<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\Status;

class CreateMusicsTable extends Migration
{

    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->id();
            $table->integer('song_key');
            $table->string('song_name');
            $table->text('thumbnail')->default('https://songdewnetwork.com/sgmedia/assets/images/default-album-art.png');
            $table->text('song_file');
            $table->string('author');
            $table->string('public_by');
            $table->integer('public_by_id');
            $table->text('lyrics')->nullable();
            $table->integer('views')->default(0);
            $table->integer('like')->default(0);
            $table->text('comments')->nullable();
            $table->integer('status')->default(Status::DEACTIVE);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('musics');
    }
}

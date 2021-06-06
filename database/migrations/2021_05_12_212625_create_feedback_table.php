<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('email');
            $table->string('message')->nullable();
            $table->string('star')->default(5);
            $table->integer('status')->default(\App\Enums\Status::ACTIVE);
            $table->timestamps();
        });
    }




    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}

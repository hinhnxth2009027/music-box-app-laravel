<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Enums\Status;
use \App\Enums\Role;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->text('avatar')->default('https://iupac.org/wp-content/uploads/2018/05/default-avatar.png');
            $table->text('cover_photo')->default('https://data.webnhiepanh.com/wp-content/uploads/2020/11/21105453/phong-canh-1.jpg');
            $table->string('address');
            $table->string('birthday');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->string('like_songs')->nullable();
            $table->integer('status')->default(Status::ACTIVE);
            $table->integer('role')->default(Role::USER);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

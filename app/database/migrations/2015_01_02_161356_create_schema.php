<?php

use Illuminate\Database\Migrations\Migration;

class CreateSchema extends Migration
{

    public function up()
    {

        Schema::create('users', function ($table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 60);
            $table->boolean('active')->default(false);
            $table->date('birthdate');
            $table->string('username', 45)->unique();
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_code', 45);
            $table->string('remember_token', 255)->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at');
        });

        Schema::create('password_reminders', function ($table) {
            $table->string('email', 255);
            $table->string('token', 255);
            $table->timestamp('created_at');
        });

        Schema::create('albums', function ($table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('content');
            $table->string('image_src', 255);
            $table->string('type', 255);
            $table->string('link', 255)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });

        Schema::create('pictures', function ($table) {
            $table->increments('id');
            $table->string('description', 45)->nullable();
            $table->string('image_src', 255);
            $table->string('thumb_src', 255);
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')->references('id')->on('albums');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });

        Schema::create('videos', function ($table) {
            $table->increments('id');
            $table->string('description', 45)->nullable();
            $table->string('link', 255);
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')->references('id')->on('albums');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::drop('videos');
        Schema::drop('pictures');
        Schema::drop('albums');
        Schema::drop('password_reminders');
        Schema::drop('users');
    }

}

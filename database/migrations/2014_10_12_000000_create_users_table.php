<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->id();
            
            $table->unsignedBigInteger('gambar_id');
            //  $table->foreign('gambar_id')->references('id')->on('gambars');
           

            $table->string('name');
            $table->enum('type',['admin',['nonAdmin']]);
            $table->boolean('isVerified');
            $table->string('email');
            $table->string('alamat');
            $table->integer('noHp');
            $table->string('deskripsi');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

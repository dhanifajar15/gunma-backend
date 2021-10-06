<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            
            // $table->unsignedBigInteger('gambar_id');
            // $table->foreign('gambar_id')->references('id')->on('gambars');
           
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');

            $table->string('namaProgram');
            $table->string('lokasi');
            $table->string('deskripsi');
            $table->string('tag');
            $table->string('benefit');
            $table->string('requirement');
            $table->string('linkRegistrasi');
            $table->enum('status',['buka','tutup']);
            $table->integer('durasi');
            $table->timestamp('closeRegistrasi');
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
        Schema::dropIfExists('internships');
    }
}

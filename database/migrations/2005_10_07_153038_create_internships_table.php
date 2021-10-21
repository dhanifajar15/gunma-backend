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
            $table->foreignId('location_id')->constrained('locations');
           // $table->foreignId('image_id')->constrained('images');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('tag_id')->constrained('tags');
            $table->string('programName');
            $table->string('description');
            $table->string('benefit');
            $table->string('requirement');
            $table->string('registrationLink');
            $table->boolean('isOpen');
            $table->integer('duration');
            $table->timestamp('closeRegistration');
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

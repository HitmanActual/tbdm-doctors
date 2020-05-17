<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //-- the doctor
            $table->integer('img_id'); //-- profile image
            $table->integer('speciality_id');
            $table->string('commercial_name');
            $table->boolean('home_visit');
            $table->enum('degree',['specialist','consultant','lecturer','associate_professor','professor']);
            $table->text('short_description');
            $table->longText('description');
            $table->integer('total_rates');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mentor_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->enum('type',['free','premium']);
            $table->enum('status',['draft','published']);
            $table->integer('price')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->foreign('mentor_id')->references('id')->on('user')->onDelete('cascade');  
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); 
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

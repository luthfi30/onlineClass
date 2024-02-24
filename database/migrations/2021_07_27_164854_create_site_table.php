<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->longText('address')->nullable();
            $table->longText('header_title')->nullable();
            $table->longText('header_description')->nullable();
            $table->string('header_image')->nullable();
            $table->longText('about_title')->nullable();
            $table->longText('about_description')->nullable();
            $table->string('about_image')->nullable();
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
        Schema::dropIfExists('site');
    }
}

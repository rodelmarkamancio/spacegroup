<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardHomePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_home_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dhomes_photos_id')->unsigned();
            $table->foreign('dhomes_photos_id')->references('id')->on('dashboard_home_mid_contents');
            $table->text('filename')->nullable();
            $table->text('hash')->nullable();
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
        Schema::dropIfExists('dashboard_home_photos');
    }
}

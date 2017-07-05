<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort_id');
            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
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
        Schema::dropIfExists('menu_lists');
    }
}

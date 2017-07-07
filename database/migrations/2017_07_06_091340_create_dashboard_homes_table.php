<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_homes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('head_text_1')->nullable();
            $table->text('head_text_2')->nullable();
            $table->text('head_text_3')->nullable();
            $table->text('head_intro')->nullable();
            $table->text('mid_content_img_1')->nullable();
            $table->text('mid_content_text_1')->nullable();
            $table->text('mid_content_desc_1')->nullable();
            $table->text('mid_content_img_2')->nullable();
            $table->text('mid_content_text_2')->nullable();
            $table->text('mid_content_desc_2')->nullable();
            $table->text('mid_content_img_3')->nullable();
            $table->text('mid_content_text_3')->nullable();
            $table->text('mid_content_desc_3')->nullable();
            $table->text('mid_content_intro_1')->nullable();
            $table->text('mid_content_intro_2')->nullable();
            $table->text('mid_content_bg')->nullable();
            $table->text('mid_content_bg_id')->nullable();
            $table->integer('footer_content_id')->nullable();
            $table->integer('footer_content_num')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('dashboard_homes');
    }
}

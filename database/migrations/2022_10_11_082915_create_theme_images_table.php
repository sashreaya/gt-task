<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_images', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable()->default(NULL);
            $table->bigInteger('user_id')->unsigned()->index('user_id')->comment('foreign key of users table');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('theme_info_id')->unsigned()->index('theme_info_id')->comment('foreign key of theme info table');
            $table->foreign('theme_info_id')->references('id')->on('theme_infos');
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
        Schema::dropIfExists('theme_images');
    }
}

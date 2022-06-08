<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_id');
            $table->foreignId('cat_id')->references('id')->on('b_log_categories');
            $table->string('blog_title');
            $table->string('image');
            $table->string('image_alternative');
            $table->longText('blog_description');
            $table->string('blog_slug');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->text('meta_description');
            $table->integer('count')->default(0);
            $table->tinyInteger('blog_status')->default(1);
            $table->tinyInteger('blog_feature')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}

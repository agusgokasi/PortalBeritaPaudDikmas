<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->tinyInteger('is_news')->default(0);
            $table->tinyInteger('is_headline')->default(0);
            $table->tinyInteger('is_gallery')->default(0);
            $table->string('title');
            $table->longtext('description')->nullable();
            $table->dateTime('news_date')->nullable();
            $table->longtext('content')->nullable();
            $table->string('banner')->nullable();
            $table->tinyInteger('status');
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('contents');
    }
}

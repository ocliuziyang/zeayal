<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('thumbnail')->default('/images/post_default.png');
            $table->text('content_raw');
            $table->text('content_html');
            $table->dateTime('published_at')->default(\Carbon\Carbon::now());
            $table->boolean('is_draft')->default(false);
            $table->string('author')->default('Zeayal');
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
        Schema::dropIfExists('posts');
    }
}

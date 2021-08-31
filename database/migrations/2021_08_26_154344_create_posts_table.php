<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->mediumText('content');
            $table->foreignId('author_id');
            $table->foreignId('category_id');
            $table->string('cover_photo')->nullable();
            $table->string('tags');
            $table->boolean('comments')->default(false);
            $table->enum('status',['published','draft','scheduled'])->default('draft');
            $table->date('scheduled_date')->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('like_count')->default(0);
            $table->integer('dislike_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->foreignId('who_removed_id')->nullable();
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
        Schema::dropIfExists('posts');
    }
}

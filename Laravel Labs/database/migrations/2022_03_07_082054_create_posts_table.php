<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * instruct the database how to create your table
     * @return void
     */
    public function up()
    {
        # define DDL of your table
        Schema::create('posts', function (Blueprint $table) {
            $table->id();  # unsigned big int -- auto-incremented, primary
            $table->string("title",100);
            $table->text("desc")->nullable();
            $table->string("info")->default("blog_post")->nullable();
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
};

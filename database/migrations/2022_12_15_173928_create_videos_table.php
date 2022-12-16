<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            //$table->id();
            $table->char('id',12)->primary();
            $table->integer('user_id');
            $table->string('title');
            $table->string('file_name')->nullable();
            $table->string('link')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('description')->nullable();
            $table->string('keyword')->nullable();
            $table->integer('is_activated')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->integer('views')->default(0);
            $table->string('type');
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
        Schema::dropIfExists('videos');
    }
};

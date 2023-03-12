<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable(TRUE);
            $table->json('thumbnail')->nullable(TRUE);
            $table->string('google_id', 200)->nullable(TRUE);
            $table->unsignedMediumInteger('comment')->default(0);
            $table->unsignedMediumInteger('favorite')->default(0);
            $table->unsignedMediumInteger('like')->default(0);
            $table->unsignedMediumInteger('dislike')->default(0);
            $table->unsignedMediumInteger('view')->default(0);
            $table->boolean('is_active')->default(FALSE);

            $table->foreignId('video_album_id')
                ->nullable()
                ->constrained()
                ->on('video_albums')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
}

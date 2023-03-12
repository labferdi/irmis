<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('file_path', 200);
            $table->json('tags')->nullable(TRUE);
            $table->string('google_id', 200)->nullable(TRUE);
            $table->string('google_url', 500)->nullable(TRUE);
            $table->boolean('is_active')->default(FALSE);

            $table->foreignId('photo_album_id')
                ->nullable()
                ->constrained()
                ->on('photo_albums')
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
        Schema::dropIfExists('photos');
    }
}

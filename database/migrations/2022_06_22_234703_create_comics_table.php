<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('user_id'); //min: 0 | max: 65535
            $table->string('title');
            $table->unsignedTinyInteger('url_id'); //min: 0 | max: 255
            $table->string('slug');
            $table->unsignedSmallInteger('chapter')->nullable(); //min: 0 | max: 65535
            $table->string('reading_status', 12)->nullable();
            // $table->string('publication_status', 9)->nullable(); //deleted because it doesn't make any sense if i record things as hiatus or not
            $table->json('note')->nullable();
            $table->unsignedDecimal('rating', 5, 1)->nullable(); //max: 5 ? idk lmao
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}

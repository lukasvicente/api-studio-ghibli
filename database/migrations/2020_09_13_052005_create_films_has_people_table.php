<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsHasPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_has_peoples', function (Blueprint $table) {

            $table->uuid('films_id');
            $table->uuid('peoples_id');


            $table->foreign('films_id')
                ->references('id')
                ->on('films')
                ->onDelete('cascade');

            $table->foreign('peoples_id')
                ->references('id')
                ->on('peoples')
                ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_has_peoples');
    }
}

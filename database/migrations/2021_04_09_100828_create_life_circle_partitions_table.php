<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifeCirclePartitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('life_circle_partitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title', 500);
            $table->string('description', 500);
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('lifeCircleId')->unsigned();
            $table->integer('progressPercent')->default(0);

            /// add foreign keys
            $table->foreign('userId')->references('id')->on('clients');
            $table->foreign('lifeCircleId')->references('id')->on('life_circles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('life_circle_partitions');
    }
}

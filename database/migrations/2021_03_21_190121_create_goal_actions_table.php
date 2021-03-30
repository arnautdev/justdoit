<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_actions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->bigInteger('goalId')->unsigned();
            $table->bigInteger('userId')->unsigned();

            $table->string('title', 500);
            $table->string('description', 500)->nullable();
            $table->string('weekDays');
            $table->enum('addToTodoList', ['yes', 'no'])->default('yes');


            /// add foreign keys
            $table->foreign('goalId')->references('id')->on('goals');
            $table->foreign('userId')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal_actions');
    }
}

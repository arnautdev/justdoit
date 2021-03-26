<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('categoryId')->unsigned()->default(0);
            $table->bigInteger('expenseSettingsId')->unsigned()->default(0);
            $table->dateTime('toDate')->default(now());
            $table->integer('amount');

            $table->string('title', 500)->nullable();
            $table->string('description', 500)->nullable();


            /// add foreign keys
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
        Schema::dropIfExists('expenses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_lead');
            $table->foreign('id_lead')
            ->references('id')
            ->on('leads')
            ->unsigned()
            ->constrained('leads')
            ->onUpdate('cascade')
            ->onDelete('cascade');   

            $table->unsignedInteger('id_architect');
            $table->foreign('id_architect')
            ->references('id')
            ->on('architects')
            ->unsigned()
            ->constrained('architects')
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
        Schema::dropIfExists('reserves');
    }
}

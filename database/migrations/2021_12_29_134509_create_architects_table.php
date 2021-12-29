<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchitectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architect', function (Blueprint $table) {

            $table->id();

            $table->string('web_site')->nullable();
            $table->string('description_experience');

           /* $table->unsignedInteger('id_user');
            $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->unsigned()
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');    
            $table->timestamps();

            */

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
        Schema::dropIfExists('architect');
    }
}

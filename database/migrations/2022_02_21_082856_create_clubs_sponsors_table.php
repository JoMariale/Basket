<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs_sponsors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')
                  ->references('id')
                  ->on('clubs')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->unsignedBigInteger('sponsor_id');
            $table->foreign('sponsor_id')
                  ->references('id')
                  ->on('sponsors')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->integer('price');
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
        Schema::dropIfExists('clubs_sponsors');
    }
}

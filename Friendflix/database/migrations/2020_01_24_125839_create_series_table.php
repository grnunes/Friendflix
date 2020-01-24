<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('nome');
			$table->string('genero');
			$table->longText('sinopse');
			$table->integer('like');
			$table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    
		Schema::table('series', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
		});
	}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}

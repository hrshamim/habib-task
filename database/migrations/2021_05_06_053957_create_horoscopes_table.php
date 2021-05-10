<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoroscopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horoscopes', function (Blueprint $table) {
            
            $table->id();
            $table->bigInteger('zodiacId')->unsigned();
            $table->foreign('zodiacId')->references('id')->on('zodiacs')->onDelete('cascade');
            $table->year('years');
            $table->string('months', 30)->nullable();
            $table->date('date');
            $table->integer('score');
            $table->string('colorCode',20)->nullable();
            $table->text('scoretext')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('orderid');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horoscopes');
    }
}

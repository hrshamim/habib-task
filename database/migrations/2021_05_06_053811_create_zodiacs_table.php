<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZodiacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zodiacs', function (Blueprint $table) {           
            $table->id();
            $table->string('title',100);
            $table->string('alias',100);
            $table->string('zodiacSign',50)->nullable();
            $table->string('startDate',50)->nullable();
            $table->string('endDate',50)->nullable();
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
        Schema::dropIfExists('zodiacs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRescuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rescues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');    // content カラム追加
            $table->integer('user_id')->unsigned()->index();
            $table->string('image')->nullable();      // image  カラム追加
            $table->string('area')->nullable();     // area   カラム追加
            $table->string('place')->nullable();      // place カラム追加
            $table->string('time')->nullable();         // timeカラム追加
            $table->string('lat');
            $table->string('lng');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rescues');
    }
}

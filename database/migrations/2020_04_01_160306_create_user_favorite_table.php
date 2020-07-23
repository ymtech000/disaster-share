<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('alert_id')->unsigned()->index();
            $table->timestamps();

            // 外部キー設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('alert_id')->references('id')->on('alerts')->onDelete('cascade');

            // user_idとalerts_idの組み合わせの重複を許さない
            $table->unique(['user_id', 'alert_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}

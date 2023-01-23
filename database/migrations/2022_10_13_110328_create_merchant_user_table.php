<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nova_merchant_user', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_id');
            $table->integer('nova_user_id');
            $table->unique(['merchant_id', 'nova_user_id']);

//            $table->foreign('merchant_id')->references('id')->on('merchants');
//            $table->foreign('user_id')->references('id')->on('users');
        });

//        Schema::create('merchant_user', function (Blueprint $table) {
////            $table->foreign('user_id')->references('id')->on('users')
////                ->onDelete('cascade');
//
//            $table->foreign('merchant_id')->references('id')->on('merchant')
//                ->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nova_merchant_user');
    }
};

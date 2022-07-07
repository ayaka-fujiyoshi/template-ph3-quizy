<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Quiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 大問テーブル
        Schema::create('big_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        // 設問テーブル （写真）
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('big_question_id');
            $table->string('image');
        });
        // 選択肢テーブル
        Schema::create('choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->integer('selection_id');
            $table->string('name');
            $table->integer('valid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('big_questions');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('choices');
    }
}

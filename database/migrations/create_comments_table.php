<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->integerIncrements('id')->comment('AUTO_INCREMENT');
      $table->string('coinName', 30)->comment('댓글 작성 코인');
      $table->string('nickName', 50)->comment('댓글 작성자 별명');
      $table->text('comment')->nullable()->comment('댓글 내용');
      $table->timestamp('created_at')->comment('댓글 작성 시각');
      $table->timestamp('updated_at')->comment('댓글 수정 시각');
      $table->comment('댓글 테이블');

      $table->foreign('coinName')->references('CoinName')->on('coins')->cascadeOnUpdate()->noActionOnDelete();
      $table->foreign('nickName')->references('NickName')->on('users')->cascadeOnUpdate()->noActionOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('comments');
  }
};
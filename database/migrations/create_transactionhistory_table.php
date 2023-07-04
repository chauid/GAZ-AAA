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
    Schema::create('transactionhistory', function (Blueprint $table) {
      $table->integerIncrements('id')->comment('AUTO_INCREMENT');
      $table->string('userID', 30)->comment('사용자ID');
      $table->string('coinName', 30)->comment('코인명');
      $table->timestamp('transactionTime')->comment('거래시각');
      $table->integer('count')->nullable()->comment('거래수량');
      $table->integer('buyPrice')->nullable()->comment('매수가격');
      $table->integer('sellPrice')->nullable()->comment('매도가격');
      $table->comment('거래 내역 테이블');

      $table->foreign('userID')->references('UserID')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
      $table->foreign('coinName')->references('CoinName')->on('coins')->cascadeOnUpdate()->noActionOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('transactionhistory');
  }
};
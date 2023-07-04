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
    Schema::create('coinshistory', function (Blueprint $table) {
      $table->integerIncrements('id')->comment('AUTO_INCREMENT');
      $table->string('coinName', 30)->comment('코인명');
      $table->timestamp('historyTime')->comment('기록 시각');
      $table->integer('openingPrice')->nullable()->comment('시가');
      $table->integer('closingPrice')->nullable()->comment('종가');
      $table->integer('lowPrice')->nullable()->comment('저가');
      $table->integer('highPrice')->nullable()->comment('고가');
      $table->boolean('delisted')->nullable()->default(false)->comment('상폐여부');
      $table->comment('코인 시세 내역 테이블');

      $table->foreign('coinName')->references('CoinName')->on('coins')->cascadeOnUpdate()->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('coinshistory');
  }
};
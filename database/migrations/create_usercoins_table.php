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
    Schema::create('usercoins', function (Blueprint $table) {
      $table->string('userID', 30)->comment('사용자ID');
      $table->string('coinName', 30)->comment('코인명');
      $table->integer('hasCount')->nullable()->default(0)->comment('보유수량');
      $table->integer('averagePrice')->nullable()->default(0)->comment('평균 단가');
      $table->primary(['userID', 'coinName']);
      $table->comment('사용자 보유코인 테이블');

      $table->foreign('userID')->references('UserID')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
      $table->foreign('coinName')->references('CoinName')->on('coins')->cascadeOnUpdate()->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('usercoins');
  }
};
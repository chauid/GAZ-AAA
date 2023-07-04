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
    Schema::create('coins', function (Blueprint $table) {
      $table->string('coinName', 30)->primary()->comment('코인명');
      $table->char('coinSymbol', 10)->comment('코인 심볼');
      $table->integer('price')->nullable()->comment('코인 가격');
      $table->boolean('delisted')->nullable()->default(false)->comment('상폐여부');
      $table->integer('delistingTerm')->nullable()->default(-1)->comment('상폐기간');
      $table->string('news', 255)->nullable()->default('')->comment('코인 뉴스');
      $table->integer('newsTerm')->nullable()->comment('코인 뉴스 기간');
      $table->integer('newsEffect')->nullable()->comment('코인뉴스 영향력');
      $table->integer('defaultPrice')->default(0)->comment('기본가');
      $table->integer('fluctuationRate')->default(0)->comment('시세 변동률');
      $table->integer('orderQuantity')->default(0)->comment('시간당 주문량: 매수+, 매도-');
      $table->comment('코인 테이블');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('coins');
  }
};
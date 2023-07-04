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
    Schema::create('userlog', function (Blueprint $table) {
      $table->integerIncrements('id')->comment('AUTO_INCREMENT');
      $table->string('userID', 30)->comment('사용자ID');
      $table->string('action', 20)->comment('로그인/로그아웃');
      $table->char('ip', 15)->comment('접속 IP');
      $table->string('agent', 255)->comment('접속 agent');
      $table->char('language', 5)->comment('사용 언어');
      $table->timestamp('connectionTime')->comment('접속 시각');
      $table->comment('사용자 접속 로그');

      $table->foreign('userID')->references('UserID')->on('users')->cascadeOnUpdate()->noActionOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('userlog');
  }
};
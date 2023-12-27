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
    Schema::create('users', function (Blueprint $table) {
      $table->string('userID', 30)->primary()->comment('사용자ID');
      $table->char('password', 70)->comment('사용자 비밀번호');
      $table->string('email', 255)->comment('사용자 이메일');
      $table->string('userName', 50)->comment('사용자 이름');
      $table->string('nickName', 50)->unique()->comment('사용자 별명');
      $table->char('phone', 11)->comment('전화번호');
      $table->date('birth')->comment('생년월일');
      $table->integer('asset')->nullable()->comment('자산');
      $table->integer('profit')->nullable()->comment('총 수익');
      $table->integer('loss')->nullable()->comment('총 손실');
      $table->unsignedInteger('userTagId')->comment('유저 태그ID');
      $table->date('created_at')->comment('회원가입일');
      $table->date('updated_at')->comment('회원정보 변경일');
      $table->comment('사용자 정보 테이블');

      $table->foreign('userTagId')->references('id')->on('usertags')->cascadeOnUpdate()->restrictOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};

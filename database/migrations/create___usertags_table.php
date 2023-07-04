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
    Schema::create('usertags', function (Blueprint $table) {
      $table->integerIncrements('id')->comment('AUTO_INCREMENT');
      $table->string('tagName', 40)->comment('태그명');
      $table->comment('사용자 태그 테이블');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('usertags');
  }
};
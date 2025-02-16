<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('news', function (Blueprint $table) {
      $table->id('id');
      $table->string('title');
      $table->text('content');
      $table->text('full_content');
      $table->string('image');
      $table->dateTime('created_at');
      $table->dateTime('updated_at');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('news');
  }
};

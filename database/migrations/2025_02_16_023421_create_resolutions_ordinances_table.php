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
    Schema::create('resolutions_ordinances', function (Blueprint $table) {
      $table->id('id');
      $table->text('title');
      $table->string('sponsored');
      $table->string('co_sponsored');
      $table->text('description');
      $table->date('date_published');
      $table->string('file_name');
      $table->date('updated_at');
      $table->date('created_at');
      $table->string('type');
      $table->text('subject_matter');
      $table->integer('year_in_series');
      $table->text('encryption_key');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('resolutions_ordinances');
  }
};

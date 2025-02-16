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
    Schema::create('sb_members', function (Blueprint $table) {
      $table->id('id');
      $table->string('first_name');
      $table->string('last_name');
      $table->string('position');
      $table->string('committee');
      $table->date('termStart');
      $table->date('termEnd');
      $table->text('biography');
      $table->string('memberImage');
      $table->date('updated_at');
      $table->date('created_at');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sb_members');
  }
};

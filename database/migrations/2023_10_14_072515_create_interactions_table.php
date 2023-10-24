<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('interactions', function (Blueprint $table) {
      $table->id();
      $table->text('type');
      $table->text('notes')->nullable();

      $table->foreignId('contact_id')->index()->constrained('contacts')->cascadeOnDelete();

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('interactions');
  }
};

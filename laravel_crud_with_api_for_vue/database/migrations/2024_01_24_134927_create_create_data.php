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
        Schema::create('create_data', function (Blueprint $table) {
            $table->id();
            $table->string('test_text', 50);
            $table->string('test_text_area')->nullable();
            $table->string('test_select');
            $table->enum('radio_option', ['radio_one', 'radio_two']);
            $table->boolean('test_check')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};

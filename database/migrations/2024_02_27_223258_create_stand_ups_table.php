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
        Schema::create('stand_ups', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('attendance', ['attend', 'not_attend', 'vacation'])->nullable();
            $table->timestamp('date');
            $table->enum('archive', [0, 1])->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stand_ups');
    }
};

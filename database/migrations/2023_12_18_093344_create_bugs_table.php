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
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('point')->nullable();
            $table->integer('exp')->nullable();
            $table->foreignId('created_by')->constrained('admins')->onDelete('cascade');
            $table->integer('responsible_admin')->nullable();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->text('images')->nullable();
            $table->integer('status_id')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bugs');
    }
};

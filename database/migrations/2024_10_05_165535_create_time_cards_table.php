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
        Schema::create('time_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('punch_type');
            $table->date('punch_date');
            $table->boolean('status');
            $table->integer('employee_id');
            $table->time('punch_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_cards');
    }
};

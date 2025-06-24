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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained();
            $table->decimal('amount', 15, 2);
            $table->string('applicable_period');
            $table->integer('no_of_months');
            $table->decimal('premium', 15, 2)->nullable();
            $table->decimal('interest', 15, 2)->nullable();
            $table->string('type');
            $table->string('control_number')->unique();
            $table->string('status');
            $table->string('file_path')->nullable();
            $table->date('status_date');
            $table->text('remarks');
            $table->string('latest');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};

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
        Schema::create('ips_tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('status_date');
            $table->text('perspective');
            $table->string('responsible_unit');
            $table->string('specific_task');
            $table->string('requestor');
            $table->string('target_output');
            $table->string('actual_output')->nullable();
            $table->string('status');
            $table->text('remarks')->nullable();
            $table->string('editor');
            $table->integer('TAT')->nullable();
            $table->foreignId('employer_id')->constrained();
            $table->smallInteger('year');
            $table->tinyInteger('month');
            $table->integer('seq');
            $table->unique(['year', 'month', 'seq'], 'unique_control_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ips_tasks');
    }
};

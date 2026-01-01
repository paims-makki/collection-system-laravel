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
        Schema::create('ams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('employer_name');
            $table->string('pen');
            $table->decimal('january', 15,2)->nullable();
            $table->integer('jan_ee')->nullable();
            $table->decimal('february', 15,2)->nullable();
            $table->integer('feb_ee')->nullable();
            $table->decimal('march', 15,2)->nullable();
            $table->integer('mar_ee')->nullable();
            $table->decimal('april', 15,2)->nullable();
            $table->integer('apr_ee')->nullable();
            $table->decimal('may', 15,2)->nullable();
            $table->integer('may_ee')->nullable();
            $table->decimal('june', 15,2)->nullable();
            $table->integer('june_ee')->nullable();
            $table->decimal('july', 15,2)->nullable();
            $table->integer('july_ee')->nullable();
            $table->decimal('august', 15,2)->nullable();
            $table->integer('aug_ee')->nullable();
            $table->decimal('september', 15,2)->nullable();
            $table->integer('sep_ee')->nullable();
            $table->decimal('october', 15,2)->nullable();
            $table->integer('oct_ee')->nullable();
            $table->decimal('november', 15,2)->nullable();
            $table->integer('nov_ee')->nullable();
            $table->decimal('december', 15,2)->nullable();
            $table->integer('dec_ee')->nullable();
            $table->string('status');
            $table->string('type');
            $table->text('remarks')->nullable();
            $table->string('reporting_month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ams');
    }
};

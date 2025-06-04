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
        Schema::create('assignments', function (Blueprint $table) {
           // $table->string('id')->primary();
            $table->id();
            $table->string('serial_machine');
            $table->string('id_work');
            $table->datetime('data_start')->useCurrent();
            $table->datetime('data_end')->nullable();
            $table->string('kilometers')->nullable();
            $table->string('id_reason')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};

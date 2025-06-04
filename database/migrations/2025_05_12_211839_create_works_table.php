<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('id_province');
            $table->datetime('date_start')->useCurrent();
            $table->datetime('date_end')->nullable();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};

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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55)
                ->unique()
            ;
            $table->unsignedSmallInteger('x');
            $table->unsignedSmallInteger('y');
            $table->foreignId('formation_id')
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('RESTRICT')
            ;
            $table->unique(['formation_id', 'x', 'y']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};

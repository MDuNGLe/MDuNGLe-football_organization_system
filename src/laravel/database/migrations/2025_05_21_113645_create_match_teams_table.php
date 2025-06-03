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
        Schema::create('match_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_match_id')
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('RESTRICT')
            ;
            $table->foreignId('team_id')
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('RESTRICT')
            ;
            $table->text('goal_moments')->nullable();
            $table->text('red_cards')->nullable();
            $table->text('yellow_cards')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_teams');
    }
};

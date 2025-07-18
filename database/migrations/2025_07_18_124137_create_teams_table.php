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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('team_team', function (Blueprint $table) {
            $table->foreignId('team1_id')->constrained('teams')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('team2_id')->constrained('teams')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('team1_goals')->nullable()->default(0);
            $table->integer('team2_goals')->nullable()->default(0);
            $table->integer('week')->default(0);
            $table->primary(['team1_id', 'team2_id']);
            $table->timestamps();
//            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
        Schema::dropIfExists('team_team');
    }
};

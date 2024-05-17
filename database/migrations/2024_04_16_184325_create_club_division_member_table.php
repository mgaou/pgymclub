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
        Schema::create('club_division_member', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('division_id');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('visa');
            $table->string('licence');
            $table->dateTime('valid_at');
            $table->string('created_by');
            $table->string('observe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_division_member');
    }
};

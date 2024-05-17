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
        Schema::table('club_division_member', function(Blueprint $table) {
            $table->text('visa')->nullable()->change();
            $table->text('licence')->nullable()->change();
            $table->text('valid_at')->nullable()->change();
            $table->text('observe')->nullable()->change();
            $table->text('end_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('club_division_member', function(Blueprint $table) {
            $table->text('visa')->change();
            $table->text('licence')->change();
            $table->text('valid_at')->change();
            $table->text('observe')->change();
            $table->text('end_at')->change();
        });
    }
};

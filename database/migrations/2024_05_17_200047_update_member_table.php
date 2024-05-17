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
        //
        Schema::table('members', function(Blueprint $table) {
            $table->text('placeofbirth')->nullable()->change();
            $table->text('birth_path')->nullable()->change();
            $table->text('picture_path')->nullable()->change();
            $table->dateTime('banned_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('members', function(Blueprint $table) {
            $table->text('placeofbirth')->change();
            $table->text('birth_path')->change();
            $table->text('picture_path')->change();
            $table->dateTime('banned_at')->change();
        });
    }
};

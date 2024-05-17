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
        Schema::table('parameters', function(Blueprint $table) {
            $table->text('text_value')->nullable()->change();
            $table->text('number_value')->nullable()->change();
            $table->text('logo_path')->nullable()->change();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('parameters', function(Blueprint $table) {
            $table->text('text_value')->change();
            $table->text('number_value')->change();
            $table->text('logo_path')->change();
         });
    }
};

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
        Schema::table('contribution_type_member', function(Blueprint $table) {
            $table->integer('value_rest')->nullable()->change();
            $table->text('observe')->nullable()->change();
            $table->text('cancel')->nullable()->change();
            $table->text('cancel_by')->nullable()->change();
            $table->dateTime('cancel_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('contribution_type_member', function(Blueprint $table) {
            $table->integer('value_rest')->change();
            $table->text('observe')->change();
            $table->text('cancel')->change();
            $table->text('cancel_by')->change();
            $table->dateTime('cancel_at')->change();
        });
    }
};

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
        Schema::create('contribution_type_member', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('contribution_type_id');
            $table->string('mounth');
            $table->integer('value');
            $table->integer('value_rest');
            $table->dateTime('paid_at');
            $table->string('observe');
            $table->string('cancel');
            $table->string('cancel_by');
            $table->dateTime('cancel_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contribution_type_member');
    }
};

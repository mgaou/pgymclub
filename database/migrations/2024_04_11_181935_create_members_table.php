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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('adress');
            $table->string('phone');
            $table->enum('gender', ['M','F']);
            $table->date('born_at');
            $table->string('placeofbirth');
            $table->boolean('active');
            $table->datetime('banned_at');
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('picture_path');
            $table->string('birth_path');
            $table->foreignId('category_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('breed');
            $table->integer('age');
            $table->string('pet_type');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};

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
        Schema::create('petting_applications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('petting_request_id');
            $table->foreign('petting_request_id')
                ->references('id')->on('petting_requests')
                ->onDelete('cascade');

            $table->unsignedBigInteger('sitter_id');
            $table->foreign('sitter_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->float('price');
            $table->boolean('is_accepted')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petting_applications');
    }
};

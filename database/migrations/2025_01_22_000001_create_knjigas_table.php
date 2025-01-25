<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('knjigas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv');
            $table->string('autor');
            $table->text('opis');
            $table->enum('status', ['dostupna', 'rezervisana'])->default('dostupna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knjigas');
    }
};

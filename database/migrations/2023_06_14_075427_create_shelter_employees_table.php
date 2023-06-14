<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shelter_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shelter_id')->constrained('shelters')->cascadeOnDelete();
            $table->string('name');
            $table->string('surname');
            $table->timestamp('employed_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shelter_employees');
    }
};

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
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->string('auditable_type');  // Model type (e.g., App\Models\Post)
            $table->unsignedBigInteger('auditable_id'); // Model ID (e.g., Post ID)
            $table->string('event'); // create, update
            $table->json('old_values')->nullable(); // Old values before update
            $table->json('new_values')->nullable(); // New values after update
            $table->unsignedBigInteger('user_id')->nullable(); // ID of the user who made changes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};

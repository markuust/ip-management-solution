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
        Schema::create('ip_management', function (Blueprint $table) {
            $table->id();
            // $table->string('ip_address');
            // $table->string('notes');
            // $table->timestamps();

            $table->ipAddress('ip_address')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('set_by_id')->nullable();
            $table->foreign('set_by_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_management');
    }
};

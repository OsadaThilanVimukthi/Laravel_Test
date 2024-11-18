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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Define the user_id column as nullable
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
            $table->string('title');
            $table->text('description');
            $table->date('due_date');
            $table->enum('priority', ['High', 'Medium', 'Low'])->default('High');
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->timestamps();
            $table->timestamp('file_created')->nullable();
            $table->timestamp('file_updated')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

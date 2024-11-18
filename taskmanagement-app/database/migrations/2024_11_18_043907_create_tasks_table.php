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
            $table->unsignedBigInteger('user_id'); // Define the user_id column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key
            $table->string('title');
            $table->date('birth_date');
            $table->enum('tableStatus', ['High', 'Medium', 'Low'])->default('High');
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
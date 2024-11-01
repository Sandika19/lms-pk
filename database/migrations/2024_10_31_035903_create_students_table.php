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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->string('fullname');
            $table->enum('major', ['PPLG', 'DKV']);
            $table->enum('grade', ['10', '11', '12']);
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('profile_picture')->nullable()->default('https://images.unsplash.com/photo-1730285541609-db6d55b06216?q=80&w=1365&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

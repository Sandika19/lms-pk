<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create("materials", function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger("classroom_id");
         $table->foreign("classroom_id")->references("id")->on("classrooms")->onDelete("cascade");
         $table->string("title");
         $table->text("description")->nullable();
         $table->string("type");
         $table->string("file_path");
         $table->string("file_name");
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists("materials");
   }
};

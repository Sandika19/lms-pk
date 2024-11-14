<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
   /** @use HasFactory<\Database\Factories\ClassroomFactory> */
   use HasFactory;

   protected $guarded = ["id"];

   public function teacher()
   {
      return $this->belongsTo(Teacher::class);
   }

   public function colorIconClass()
   {
      $color = match ($this->class) {
         "x" => "class-x",
         "xi" => "class-xi",
         "xii" => "class-xii",
         default => "",
      };

      return $color;
   }
}

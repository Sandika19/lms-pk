<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
   public function submitAssignment(Classroom $classroom, Material $material, Request $request)
   {
      dd($request);
   }
}

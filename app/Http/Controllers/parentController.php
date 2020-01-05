<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\students;
use App\evaluations; 

class parentController extends Controller
{
    //
   	public function show_students()
   	{
        
        	return students::where('users_id', Auth::id())->get();
        
         
   	}
   	public function show_evaluations()
   	{

        	$students_id = students::where('users_id', Auth::id())->pluck('id');
        	return evaluations::whereIn('students_id', $students_id)->get()->all();
   	}

}

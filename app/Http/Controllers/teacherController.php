<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\classes;
use App\evaluations;
use App\students;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class teacherController extends Controller
{
    //


    public function show_classes()
    {
        //dd(Auth::id());
        return classes::where('users_id', Auth::id())->get();
    }

    public function show_students()//for current teacher
    {
        $classes_id = classes::where('users_id', Auth::id())->pluck('id');
        return students::whereIn('class_id', $classes_id)->get();

    }
    public function show_class_students(Request $request, classes $class)//for specific class
    {
        $classes_id = classes::where('id', $class->id )->where('users_id', Auth::id())->pluck('id');
        return students::whereIn('class_id', $classes_id)->get();

    }

    public function evaluate_student()
    {
            $evaluate_student = new evaluations();

            request()->validate([
                'student_id'=> 'required|exists:students,id',
                'evaluation'=> 'required|numeric|min:1|max:10',
            ]);

            $class_id = students::where('id', request('student_id'))->get('class_id')->first()->class_id;

             if(Auth::id() == classes::where('id', $class_id)->get('users_id')->first()->users_id )
            {
                $evaluate_student->students_id = request('student_id');
                $evaluate_student->evaluation = request('evaluation');
                $evaluate_student->users_id = Auth::user()['id'];
                $evaluate_student->time_submitted = Carbon::now();

                $evaluate_student->save();
                return response()->json(['success'=>'added successfully'], 200);
            }

            else{

                return response()->json(['failed'=>'unauthorized'], 401);
            }


    }

    public function add_student() //with associated parent
    {
        $add_student = new students();

        request()->validate([
            'name' => 'required',
            'parent_id' => 'required|exists:users,id',
            'class_id' => 'required|exists:classes,id',
        ]);


            $add_student->name = request('name');
            $add_student->users_id = request('parent_id');
            $add_student->class_id = request('class_id');

            $add_student->save();
            return response()->json(['success' => 'added successfully'], 200);

    }


    public function del_student()
    {
        request()->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        $class_id = students::where('id', request('student_id'))->pluck('class_id');

        $teacher_id = classes::where('id', $class_id)->first()->users_id;
        if($teacher_id == Auth::id())
        {
            students::destroy(request('student_id'));
        }
        else{
            return response()->json(['failed' => 'unauthorized'], 401);

        }


    }



}

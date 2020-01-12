<?php

namespace App\Http\Controllers;
use App\school;
use App\classes;
use App\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function add_school() //with associated parent
    {
        request()->validate([
            'name' => 'required',
        ]);
        school::Create(['name' => request('name')]);

    }
    public function add_class()
    {
        request()->validate([
            'name' => 'required',
            'school_id' => 'required|exists:school,id',
            'teacher_id' => 'required|exists:users,id',
        ]);
        $teacher = User::where('id', request('teacher_id'))->pluck('role_type')->first();

        if($teacher != 'teacher')
        {
            return response()->json(['failed' => 'Invalid teacher id'], 401);

        }
        $add_class = new classes();
        $add_class->name = request('name');
        $add_class->school_id = request('school_id');
        $add_class->users_id = request('teacher_id');

        $add_class->save();
        return response()->json(['success' => 'added successfully'], 200);




    }


}

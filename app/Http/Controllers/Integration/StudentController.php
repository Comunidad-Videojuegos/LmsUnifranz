<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\USR_Info;
use App\Models\User;
use App\Models\Integration\INP_Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        return view('users.students');
    }

    public function students()
    {
        $studentsWithInfo = INP_Student::with(['info' => function($query) {
            $query->select('id', 'firstName', 'dadLastName', 'momLastName');
        }])->get();


        $filteredStudents = $studentsWithInfo->map(function ($student) {
            return [
                'id' => $student->id,
                'name' => $student->info->firstName . $student->info->dadLastName. $student->info->momLastName,
            ];
        });

        return $filteredStudents;
    }

}

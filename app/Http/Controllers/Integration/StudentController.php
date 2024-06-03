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

    public function index(Request $request)
    {
        $pageNumber = $request->input('pageNumber');

        if(!$pageNumber) $pageNumber = 1;

        $perPage = 10; // Número de usuarios por página
        $offset = ($pageNumber - 1) * $perPage;

        // Contar el total de usuarios que tienen estudiantes
        $totalUsers = User::whereHas('students')->count();
        $totalPages = ceil($totalUsers / $perPage);

        $users = User::with('userInfo')
            ->whereHas('students')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return view('students.students')
            ->with('users', $users)
            ->with('totalPages', $totalPages)
            ->with('totalUsers', $totalUsers)
            ->with('pageNumber', $pageNumber);
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

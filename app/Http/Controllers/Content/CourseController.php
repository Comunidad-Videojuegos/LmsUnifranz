<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Integration\INP_CourseInscribed;
use App\Models\Content\CON_CourseSection;
use App\Models\Content\CON_Task;
use App\Models\Colaboration\COL_Forum;
use Illuminate\Support\Facades\DB;
class CourseController extends Controller
{
    public function index()
    {
        return view('courses.courses');
    }

    public function coursesOfStudent(Request $request)
    {
        $studentId = $request->input("studentId");

        // Consulta inicial
        $results = INP_CourseInscribed::join('INP_Course', 'INP_CourseInscribed.courseId', '=', 'INP_Course.id')
            ->join('USR_Info', 'INP_Course.instructorId', '=', 'USR_Info.id')
            ->select(
                'INP_Course.id as courseId',
                'USR_Info.firstName as instructorName'
            )
            ->where('INP_CourseInscribed.studentId', $studentId)
            ->whereYear('INP_CourseInscribed.createDate', 2024)
            ->get();

        // Array de nombres de materias
        $materiaNombres = [
            'Matemáticas',
            'Historia',
            'Ciencias',
            'Literatura',
            'Física',
            'Química'
        ];

        $materiaImagen = 'https://static.vecteezy.com/system/resources/thumbnails/022/645/069/small/illustration-painting-of-love-riding-on-bicycle-generate-ai-photo.jpg';

        $enhancedResults = $results->map(function ($item) use ($materiaNombres, $materiaImagen) {
            return [
                'courseId' => $item->courseId,
                'instructorName' => $item->instructorName,
                'materiaNombre' => $materiaNombres[array_rand($materiaNombres)],
                'materiaImagen' => $materiaImagen,
                'advance' => rand(0, 100)
            ];
        });

        return response()->json($enhancedResults);
    }

    public function sectionsOfCourse(Request $request)
    {
        $courseId = $request->input("courseId");

        $courseSections = CON_CourseSection::where('courseId', $courseId)
            ->orderBy('name')
            ->get();

        // Mapear los resultados para incluir los campos requeridos
        $mappedResults = $courseSections->map(function ($section) {
            return [
                'id' => $section->id,
                'name' => $section->name,
                'assistance' => $section->assistance // Puedes ajustar este valor según tu lógica
            ];
        });
        return response()->json($mappedResults);
    }

    public function taskForumOfSection(Request $request)
    {
        $sectionId = $request->input('sectionId');

        // Obtener los resultados de CON_Task
        $taskResults = CON_Task::select('id', 'calification', 'orderNumber', 'name', 'description')
        ->where('courseSectionId', $sectionId)
        ->selectRaw("'TAREA' as type");

        // Obtener los resultados de COL_Forum
        $forumResults = COL_Forum::select('id', DB::raw('0 as calification'), 'orderNumber', 'header as name', 'content as description')
        ->where('courseSectionId', $sectionId)
        ->selectRaw("'FORO' as type");

        // Combinar los resultados
        $results = $taskResults->union($forumResults)->orderBy('orderNumber')->get();

        // Devolver los resultados en formato JSON
        return response()->json($results);
    }

}

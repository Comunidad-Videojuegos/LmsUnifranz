<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reports\RPT_TaskDeliveries;
use App\Models\Content\CON_TaskDeliveryFile;

class TaskController extends Controller
{
    public function tasksDeliveried(Request $request)
    {
        $v = $request->input('v');
        $studentId = $request->input('studentId');

        $results = RPT_TaskDeliveries::selectRaw('COUNT(*) as entregas')
            ->select('RPT_TaskDeliveries.TaskId as id', 'CON_Task.name as name', 'CON_Task.description as description', 'INP_Course.name as Materia')
            ->selectRaw("'2024-07-07' as ExpirateTask")
            ->leftJoin('CON_Task', 'RPT_TaskDeliveries.taskId', '=', 'CON_Task.id')
            ->leftJoin('CON_CourseSection', 'CON_Task.courseSectionId', '=', 'CON_CourseSection.id')
            ->leftJoin('INP_Course', 'CON_CourseSection.courseId', '=', 'INP_Course.id')
            ->where('RPT_TaskDeliveries.studentId', $studentId)
            ->where('RPT_TaskDeliveries.viewed', $v)
            ->where('RPT_TaskDeliveries.reviewed', $v)
            ->groupBy('RPT_TaskDeliveries.taskId', 'CON_Task.name', 'CON_Task.description', 'INP_Course.name')
            ->get();

        return response()->json($results);
    }

    public function taskInfo(Request $request)
    {
        $taskId = $request->input('taskId');
        $studentId = $request->input('studentId');

        // Obtener las entregas de tarea
        $taskDeliveries = RPT_TaskDeliveries::select('id', 'viewed', 'reviewed', 'calification')
            ->where('taskId', $taskId)
            ->where('studentId', $studentId)
            ->get();

        // Obtener los archivos asociados a cada entrega de tarea
        foreach ($taskDeliveries as $delivery) {
            $files = CON_TaskDeliveryFile::select('id', 'size', 'link', 'type')
                ->where('deliveryId', $delivery->id)
                ->get();

            // Agregar los archivos a la entrega de tarea como un campo adicional
            $delivery->files = $files;
        }

        // Devolver las entregas de tarea en formato JSON
        return response()->json($taskDeliveries);
    }
}

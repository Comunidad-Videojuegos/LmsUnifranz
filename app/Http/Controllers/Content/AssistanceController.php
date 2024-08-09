<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Integration\INP_CourseSchedule;
use App\Models\Reports\RPT_CourseAssistance;
use App\Models\Reports\RPT_CourseAssistanceType;

class AssistanceController extends Controller
{
    public function assistanceOfStudent(Request $request)
    {
        $courseId = $request->input('courseId');
        $studentId = $request->input('studentId');

        // Obtener los horarios del curso
        $schedules = INP_CourseSchedule::select('id', 'schoolDay', 'timeStart', 'timeEnd')
            ->where('courseId', $courseId)
            ->get();

        // Recorrer cada horario para agregar asistencias y tipos de asistencia
        $result = $schedules->map(function ($schedule) use ($studentId) {
            // Obtener las asistencias para este horario y estudiante
            $assistances = RPT_CourseAssistance::select('id', 'typeId')
                ->where('scheduleId', $schedule->id)
                ->where('studentId', $studentId)
                ->with('type:id,name')
                ->get();

            // Formatear las asistencias
            $formattedAssistances = $assistances->map(function ($assistance) {
                return [
                    'id' => $assistance->id,
                    'type' => $assistance->type->name,
                    'date' => date("Y-m-d H:i:s"),
                ];
            });

            // Formatear el horario con las asistencias
            return [
                'id' => $schedule->id,
                'schoolDay' => $schedule->schoolDay,
                'timeStart' => $schedule->timeStart,
                'timeEnd' => $schedule->timeEnd,
                'assistance' => $formattedAssistances,
            ];
        });

        // Devolver los resultados en formato JSON
        return response()->json($result);
    }


    public function typesAssistance()
    {
        $assistanceTypes = RPT_CourseAssistanceType::select('id', 'name', 'description')
            ->get();

        // Devolver los resultados en formato JSON
        return response()->json($assistanceTypes);
    }

    public function makeAssistance(Request $request)
    {
        // BODY JSON
        $studentId = $request->input('studentId');
        $scheduleId = $request->input('scheduleId');
        $typeAssistanceId = $request->input('typeAssistanceId');

        return response()->json(["message" => "Agregado correctamente"], 200);
    }

}

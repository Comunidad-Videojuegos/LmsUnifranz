<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\JasperConnection;
use Carbon\Carbon;

class TaskReportController extends Controller
{
    public function made(Request $request)
    {
        // OBTENIENDO LOS DATOS DE LA QUERY
        $taskId = $request->input('taskId');
        $students = $request->input('students');
        $initDate = $request->input('initDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        // OBTENIENDO LOS FORMATOS
        Carbon::setLocale('es');
        $initDate = Carbon::createFromFormat('Y-m-d', $initDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        $initDateText = $initDate->format('j \d\e\l F \d\e Y');
        $endDateText = $endDate->format('j \d\e F \d\e Y');


        // GENERANDO EL REPORTE
        $name_file = "TaskMade";

        $jasper = new JasperConnection($name_file, $type);

        // Definir los parámetros
        $params = array(
            "TaskId" => $taskId,
            "Students" => $students,
            "InitDate" => $initDate,
            "EndDate" => $endDate,
            "InitDateText" => $initDateText,
            "EndDateText" => $endDateText,
        );

        $jasper->setFileReport($name_file);
        $jasper->parameters = $params;
        $jasper->executeReport();

        return response()->json($jasper->publicCloudinary());
    }

    public function noMade(Request $request)
    {
        // OBTENIENDO LOS DATOS DE LA QUERY
        $taskId = $request->input('taskId');
        $initDate = $request->input('initDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        // OBTENIENDO LOS FORMATOS
        Carbon::setLocale('es');
        $initDate = Carbon::createFromFormat('Y-m-d', $initDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        $initDateText = $initDate->format('j \d\e\l F \d\e Y');
        $endDateText = $endDate->format('j \d\e F \d\e Y');


        // GENERANDO EL REPORTE
        $name_file = "TaskMade";

        $jasper = new JasperConnection($name_file, $type);

        // Definir los parámetros
        $params = array(
            "TaskId" => $taskId,
            "InitDate" => $initDate,
            "EndDate" => $endDate,
            "InitDateText" => $initDateText,
            "EndDateText" => $endDateText,
        );

        $jasper->setFileReport($name_file);
        $jasper->parameters = $params;
        $jasper->executeReport();

        return response()->json($jasper->publicCloudinary());
    }

    public function madeNoMade(Request $request)
    {
        // OBTENIENDO LOS DATOS DE LA QUERY
        $taskId = $request->input('taskId');
        $students = $request->input('students');
        $initDate = $request->input('initDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        // OBTENIENDO LOS FORMATOS
        Carbon::setLocale('es');
        $initDate = Carbon::createFromFormat('Y-m-d', $initDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        $initDateText = $initDate->format('j \d\e\l F \d\e Y');
        $endDateText = $endDate->format('j \d\e F \d\e Y');


        // GENERANDO EL REPORTE
        $name_file = "TaskMadeNoMade";

        $jasper = new JasperConnection($name_file, $type);

        // Definir los parámetros
        $params = array(
            "TaskId" => $taskId,
            "Students" => $students,
            "InitDate" => $initDate,
            "EndDate" => $endDate,
            "InitDateText" => $initDateText,
            "EndDateText" => $endDateText,
        );

        $jasper->setFileReport($name_file);
        $jasper->parameters = $params;
        $jasper->executeReport();

        return response()->json($jasper->publicCloudinary());
    }
}

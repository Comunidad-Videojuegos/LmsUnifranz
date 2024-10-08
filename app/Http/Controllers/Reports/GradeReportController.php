<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\USR_Info;
use App\Helpers\JasperConnection;
use Carbon\Carbon;

class GradeReportController extends Controller
{
    public function forStudent(Request $request)
    {
        // OBTENIENDO LOS DATOS DE LA QUERY
        $sectionId = $request->input('sectionId');
        $studentId = $request->input('studentId');
        $initDate = $request->input('initDate');
        $endDate = $request->input('endDate');
        $type = $request->input('type');

        $info = USR_Info::find($studentId);

        // OBTENIENDO LOS FORMATOS
        Carbon::setLocale('es');
        $initDate = Carbon::createFromFormat('Y-m-d', $initDate);
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate);

        $initDateText = $initDate->format('j \d\e\l F \d\e Y');
        $endDateText = $endDate->format('j \d\e F \d\e Y');

        // GENERANDO EL REPORTE
        $name_file = "GradeStudent";

        $jasper = new JasperConnection($name_file, $type);

        // Definir los parámetros
        $params = array(
            "SectionId" => $sectionId,
            "StudentId" => $studentId,
            "InitDate" => $initDate,
            "EndDate" => $endDate,
            "InitDateText" => $initDateText,
            "EndDateText" => $endDateText,
            "StudentName" => $info->firstName. ' '. $info->dadLastName. ' '. $info->momLastName,
            "Logo" => getcwd() . "/imgs/unifranz.png"
        );

        $jasper->setFileReport($name_file);
        $jasper->parameters = $params;
        $jasper->executeReport();

        try {
            $outputBytes = $jasper->getOutputBytes();
            $outputFilePath = $jasper->getOutputFile();
            $mimeType = mime_content_type($outputFilePath);
            $fileName = basename($outputFilePath);

            return response($outputBytes)
                ->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
                ->header('Content-Length', filesize($outputFilePath));
        } catch (Exception $e) {
            Log::error('Error al generar el reporte: ' . $e->getMessage());

            return response()->json(['error' => 'Error al generar el reporte'], 500);
        }
    }

    public function general(Request $request)
    {
        // OBTENIENDO LOS DATOS DE LA QUERY
        $sectionId = $request->input('sectionId');
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
        $name_file = "GradeGeneral";

        $jasper = new JasperConnection($name_file, $type);

        // Definir los parámetros
        $params = array(
            "SectionId" => $sectionId,
            "InitDate" => $initDate,
            "EndDate" => $endDate,
            "InitDateText" => $initDateText,
            "EndDateText" => $endDateText,
            "Logo" => getcwd() . "/imgs/unifranz.png"
        );

        $jasper->setFileReport($name_file);
        $jasper->parameters = $params;
        $jasper->executeReport();

        try {
            $outputBytes = $jasper->getOutputBytes();
            $outputFilePath = $jasper->getOutputFile();
            $mimeType = mime_content_type($outputFilePath);
            $fileName = basename($outputFilePath);

            return response($outputBytes)
                ->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
                ->header('Content-Length', filesize($outputFilePath));
        } catch (Exception $e) {
            Log::error('Error al generar el reporte: ' . $e->getMessage());

            return response()->json(['error' => 'Error al generar el reporte'], 500);
        }
    }
}

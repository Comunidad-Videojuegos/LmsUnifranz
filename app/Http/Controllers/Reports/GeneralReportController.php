<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\JasperConnection;
use Carbon\Carbon;

class GeneralReportController extends Controller
{
    public function studentsForCareer(Request $request)
    {
        // OBTENIENDO LOS DATOS DE LA QUERY
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
        $name_file = "Students";

        $jasper = new JasperConnection($name_file, $type);

        // Definir los parámetros
        $params = array(
            "InitDate" => $initDate,
            "EndDate" => $endDate,
            "InitDateText" => $initDateText,
            "EndDateText" => $endDateText,
            "Logo" => getcwd() . "/imgs/unifranz.png"
        );

        $jasper->setFileReport($name_file);
        $jasper->parameters = $params;
        $jasper->executeReport();

        return response()->json($jasper->publicCloudinary());
    }

    public function studentsForCareerGrafic(Request $request)
    {
        // OBTENIENDO LOS DATOS DE LA QUERY
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
        $name_file = "StudentsGrafic";

        $jasper = new JasperConnection($name_file, $type);

        // Definir los parámetros
        $params = array(
            "InitDate" => $initDate,
            "EndDate" => $endDate,
            "InitDateText" => $initDateText,
            "EndDateText" => $endDateText,
            "Logo" => getcwd() . "/imgs/unifranz.png"
        );

        $jasper->setFileReport($name_file);
        $jasper->parameters = $params;
        $jasper->executeReport();

        return response()->json($jasper->publicCloudinary());
    }
    public function studentsForCourse()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }

    public function instructors()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }

    public function activities()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }

    public function taskForumForm()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }

    public function student()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }

    public function studentRecord()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }

    public function instructor()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }
}

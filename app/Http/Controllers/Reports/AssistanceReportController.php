<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssistanceReportController extends Controller
{
    public function general()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }

    public function forStudent()
    {
        return response()->json("https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf");
    }
}

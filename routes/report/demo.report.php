
<?php

use App\Helpers\JasperConnection;
use Illuminate\Support\Facades\Route;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


function headersPdf($output, $name_file, $type)
{
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.time()."_$name_file.$type");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Content-Length: ' . filesize($output));
    flush();
    readfile($output);
    unlink($output);
}



Route::get('/demo/{param}', function (string $param) {

    $name_file = "Demo";
    $jasper = new JasperConnection($name_file, "pdf");

    // Definir los parámetros
    $params = array(
        "LogoEmpresa" => getcwd() . "/imgs/google_logo.png",
        "Param1" => $param
    );

    $jasper->setFileReport("ReportDemoGrafic");
    $jasper->parameters = $params;
    $jasper->executeReport();

    $outputFile = $jasper->getOutputFile();
    $uploadedFileUrl = Cloudinary::uploadFile($request->file($outputFile)->getRealPath())->getSecurePath();

    return response()->json([
        "file" => "wedwed"
    ]);
});

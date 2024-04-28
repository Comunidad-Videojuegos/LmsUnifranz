
<?php

use App\Helpers\JasperConnection;
use Illuminate\Support\Facades\Route;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


Route::get('/demo/{param}', function (string $param) {

    $type = "pdf";
    $name_file = "ReportDemoGrafic";

    $jasper = new JasperConnection($name_file, $type);

    // Definir los parámetros
    $params = array(
        "LogoEmpresa" => getcwd() . "/imgs/google_logo.png",
        "Param1" => $param
    );

    $jasper->setFileReport($name_file);
    $jasper->parameters = $params;
    $jasper->executeReport();

    $outputFile = $jasper->getOutputFile();

    // SUBIR A CLOUDINARY
    $uploadedFileUrl = Cloudinary::uploadFile($outputFile, [
        'public_id' => 'Reports/'.$name_file.time().$type
    ])->getSecurePath();

    unlink($outputFile);

    return response()->json([
        "file" => $uploadedFileUrl
    ]);
});

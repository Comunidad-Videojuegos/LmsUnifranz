<?php
namespace App\Helpers;

use JasperPHP\JasperPHP;

class JasperConnection
{
    private string $inputFile;
    private bool $setValueFile;

    private string $outputFile;

    public? array $parameters;
    private? array $connection;

    public function __construct(
        string $init_name_file,
        array $formats = null
    ) {
        // FORMATO DE REPORTE
        if ($formats === null) {
            $this->formats = ['pdf'];
        } else {
            $this->formats = $formats;
        }

        // LECTURA DEL APPSETTINGS.JSON
        $dir_proyect = base_path();

        // LUGAR DE LOS REPORTES DE ENTRADA Y DE SALIDA
        $name_file = time() . '_'. $init_name_file;
        $this->setValueFile = false;
        $this->inputFile = $dir_proyect . "/app/Reports/";
        $this->outputFile = $dir_proyect . "/public/documents/$name_file";

        // CONECTAR A LA BD
        $this->setDatabase();
    }

    public function getOutputFile() : string
    {
        return $this->outputFile.'.'.$this->formats[0];
    }

    private function setDatabase(): void
    {
        $db_server = env('DB_HOST_JASPER', '127.0.0.1');
        $db_name = env('DB_JASPER', 'master');
        $db_user = env('DB_USER_JASPER', 'sa');
        $db_pass = env('DB_PASS_JASPER', '1234');
        $db_encript = (env('DB_ENC_JASPER', 'true') == 1 ? "true" : "false");
        $db_cert = (env('DB_TRUST_SERVER_CERTIFICATE', 'true') == 1 ? "true" : "false");


        $this->connection = [
            "driver" => "generic",
            "username" => $db_user,
            "password" => $db_pass,
            "host" => $db_server,
            "database" => $db_name,
            "jdbc_url" => "jdbc:sqlserver://$db_server;databaseName=$db_name;encrypt=$db_encript;trustServerCertificate=$db_cert",
            "jdbc_driver" => "com.microsoft.sqlserver.jdbc.SQLServerDriver"
        ];
    }

    public function setFileReport(string $nameReport): void
    {
        $this->inputFile .= $nameReport . ".jrxml";
        $this->setValueFile = true;
    }

    public function executeReport(): bool
    {
        if ($this->setValueFile) {
            $jasperReader = new JasperPHP();

            try {
                // Compilar el archivo de entrada
                $jasperReader->compile($this->inputFile);

                // Procesar el archivo de entrada
                $jasperReader->process(
                    $this->inputFile,
                    $this->outputFile,
                    $this->formats,
                    $this->parameters,
                    $this->connection
                );

                // Ejecutar el proceso
                $jasperReader->execute();
                return true;
            } catch (Exception $ex) {
                echo "Error: " . $ex->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }

}

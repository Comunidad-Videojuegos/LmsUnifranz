<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reports\RPT_TaskDeliveries;
use App\Models\Content\CON_TaskDeliveryFile;
use App\Models\Content\CON_Task;
use App\Models\Content\CON_TaskFile;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Content\CON_CourseSection;

class TaskController extends Controller
{
    private $host = "127.0.0.1:8000";
    private $host_lms = "http://lmsunifranz.online:8000";
    private $service_email = "/api/mail/";
    public function tasksDeliveried(Request $request)
    {
        $studentId = $request->input('studentId');

        $results = RPT_TaskDeliveries::selectRaw('COUNT(*) as entregas')
            ->select('RPT_TaskDeliveries.TaskId as id', 'CON_Task.name as name', 'CON_Task.description as description', 'INP_Course.name as Materia')
            ->selectRaw("'2024-07-07' as ExpirateTask")
            ->leftJoin('CON_Task', 'RPT_TaskDeliveries.taskId', '=', 'CON_Task.id')
            ->leftJoin('CON_CourseSection', 'CON_Task.courseSectionId', '=', 'CON_CourseSection.id')
            ->leftJoin('INP_Course', 'CON_CourseSection.courseId', '=', 'INP_Course.id')
            ->where('RPT_TaskDeliveries.studentId', $studentId)
            ->groupBy('RPT_TaskDeliveries.taskId', 'CON_Task.name', 'CON_Task.description', 'INP_Course.name')
            ->get();

        return response()->json($results);
    }

    public function taskInfo(Request $request)
    {
        $taskId = $request->input('taskId');
        $studentId = $request->input('studentId');

        // Obtener las entregas de tarea
        $taskDeliveries = RPT_TaskDeliveries::select('id', 'calification')
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

    public function createTask(Request $request)
    {
        // FORM DATA
        $name = $request->input('name');
        $instructorId = $request->input('instructorId');
        $description = $request->input('description');
        $courseSectionId = $request->input('courseSectionId');
        $valoration = $request->input('valoration');
        $orderNumber = $request->input('orderNumber');

        $nameFileTask = $request->input('nameFilesTask', []);
        $files = $request->file('files', []);

        try {
            // Iniciar una transacción
            DB::beginTransaction();

            $task = CON_Task::create([
                'courseSectionId' => $courseSectionId,
                'valoration' => $valoration,
                'orderNumber' => $orderNumber,
                'missing' => 1,
                'name' => $name,
                'description' => $description
            ]);

            // Si se han adjuntado archivos
            if (!empty($files)) {

                $filePaths = [];
                foreach ($files as $file) {
                    $filePaths[] = $file->store('uploads');
                }

                for ($i=0; $i < count($filePaths); $i++)
                {
                    // Subir archivo a Cloudinary
                    $uploadedFileUrl = Cloudinary::uploadFile(storage_path('app/'. $filePaths[$i]), [
                        'public_id' => 'TaskFiles'
                    ])->getSecurePath();

                    // Insertar en COL_ForumConversationFile
                    CON_TaskFile::create([
                        'taskId' => $task->id,
                        'link' => $uploadedFileUrl,
                        'name' => $nameFileTask[$i]
                    ]);
                }
            }

            DB::commit();


            $courseId = CON_CourseSection::find($courseSectionId)->courseId;
            // ENVIO DE CORREO ELECTRONICO
            try
            {
                // Data to send to the other service
                $data = [
                    'user' => "callelazodeynarluis@gmail.com",
                    'name' => "",
                    'title' => "El docente a agregado una nueva tarea",
                    'message' => "
                        Se agrego una tarea, para poder ver esa tarea ingresa al siguiente enlace\n
                        $host_lms/dashboard/courses/$courseId/sections/$courseSectionId/tasks/".$task->id,
                    'userId' => 4
                ];
                $url = $this->host . $this->service_email . "notification";
                $response = $this->callOtherService($url, $data);

                // Check response from the other service
                if ($response['status'] !== 200) {
                    return response()->json(['message' => 'Agregado, pero no se pudo enviar el correo'], 200);
                }


            }catch(\Exception $e)
            {

            }

            // Respuesta exitosa
            return response()->json(["message" => "Agregado correctamente, y correo enviado"], 200);
        } catch (\Exception $e) {
            // Si hay un error, revertir la transacción
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function addDelivery(Request $request)
    {
        // FORM DATA
        $studentId = $request->input('studentId');
        $taskId = $request->input('taskId');

        $files = $request->file('files', []);

        try {
            // Iniciar una transacción
            DB::beginTransaction();

            $delivery = RPT_TaskDeliveries::create([
                'taskId' => $taskId,
                'studentId' => $studentId,
                'viewed' => 0,
                'reviewed' => 0
            ]);

            // Si se han adjuntado archivos
            if (!empty($files)) {

                $filePaths = [];
                foreach ($files as $file) {
                    $filePaths[] = $file->store('uploads');
                }

                for ($i=0; $i < count($filePaths); $i++)
                {
                    // Subir archivo a Cloudinary
                    $uploadedFileUrl = Cloudinary::uploadFile(storage_path('app/'. $filePaths[$i]), [
                        'public_id' => 'DeliveryFiles'
                    ])->getSecurePath();

                    // Obtener información sobre el archivo subido
                    $size = $files[$i]->getSize();
                    $roundedSize = round($size / 1024, 2);
                    $extension = $files[$i]->getClientOriginalExtension();
                    $type = $extension;

                    // Insertar en COL_ForumConversationFile
                    CON_TaskDeliveryFile::create([
                        'deliveryId' => $delivery->id,
                        'link' => $uploadedFileUrl,
                        'size' => $size,
                        'type' => $type,
                    ]);
                }
            }

            // Confirmar la transacción
            DB::commit();

            // Respuesta exitosa
            return response()->json(["message" => "Agregado correctamente"], 200);
        } catch (\Exception $e) {
            // Si hay un error, revertir la transacción
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function gradeTask(Request $request)
    {
        // BODY JSON
        $calification = $request->input('calification');
        $taskId = $request->input('taskId');

        return response()->json(["message" => "Actualizado con exito"], 200);
    }

    public function deleteTask(Request $request)
    {
        // QUERY URL
        $taskId = $request->input('taskId');

        return response()->json(["message" => "Eliminado con exito"], 200);
    }

    private function callOtherService($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'status' => $httpCode,
            'response' => json_decode($response, true)
        ];
    }
}

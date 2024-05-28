<?php

namespace App\Http\Controllers\Content;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Colaboration\COL_ForumConversation;
use App\Models\Colaboration\COL_ForumConversationFile;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ForumController extends Controller
{

    public function forumConversation(Request $request)
    {
        $forumId = $request->input('forumId');

        $conversations = COL_ForumConversation::select('id', 'message')
            ->where('forumId', $forumId)
            ->whereNull('deleteDate')
            ->with([
                'files:id,conversationId,link,size,type',
                'responses' => function ($query) {
                    $query->select('id', 'message', 'conversationId')
                        ->with(['files:id,conversationId,link,size']);
                }
            ])
            ->take(1000)
            ->get();

        return response()->json($conversations);
    }


    public function addMessageConversation(Request $request)
    {
        // QUERY
        $forumId = $request->input('forumId');
        $userId = $request->input('userId');

        // FORMDATA
        $conversationId = $request->input('conversationId');
        $message = $request->input('message');
        $files = $request->file('files', []);

        try {
            // Iniciar una transacción
            DB::beginTransaction();

            // Insertar en COL_ForumConversation
            $conversation = COL_ForumConversation::create([
                'conversationId' => $conversationId,
                'educatorId' => $userId,
                'forumId' => $forumId,
                'message' => $message
            ]);

            // Si se han adjuntado archivos
            if (!empty($files)) {// Guardar archivos localmente

                $filePaths = [];
                foreach ($files as $file) {
                    $filePaths[] = $file->store('uploads');
                }

                for ($i=0; $i < count($filePaths); $i++)
                {
                    // Subir archivo a Cloudinary
                    $uploadedFileUrl = Cloudinary::uploadFile(storage_path('app/'. $filePaths[$i]), [
                        'public_id' => 'ForumFiles'
                    ])->getSecurePath();

                    // Obtener información sobre el archivo subido
                    $size = $files[$i]->getSize();
                    $roundedSize = round($size / 1024, 2);
                    $extension = $files[$i]->getClientOriginalExtension();
                    $type = $extension;

                    // Insertar en COL_ForumConversationFile
                    COL_ForumConversationFile::create([
                        'conversationId' => $conversation->id,
                        'link' => $uploadedFileUrl,
                        'size' => $roundedSize,
                        'type' => $type
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

    public function deleteConversation(Request $request)
    {
        $conversationId = $request->input('conversationId');

        try {
            // Buscar la conversación por su ID
            $conversation = COL_ForumConversation::findOrFail($conversationId);

            // Actualizar el campo deleteDate a la fecha y hora actual
            $conversation->update(['deleteDate' => date("Y-m-d H:i:s")]);

            // Respuesta exitosa
            return response()->json(["message" => "La conversación ha sido eliminada correctamente"], 200);
        } catch (\Exception $e) {
            // En caso de error, devolver un mensaje de error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function createForum(Request $request)
    {
        // FORM DATA
        $header = $request->input('header');
        $content = $request->input('content');
        $instructorId = $request->input('instructorId');
        $orderNumber = $request->input('orderNumber');

        $nameFile = $request->input('nameFiles', []); // De que trata el archivo adjunto
        $descFile = $request->input('descFiles', []); // Inf mas detallada del archivo adjunto
        $files = $request->input('files', []);

        return response()->json(["message" => "Agregado correctamente"], 200);
    }

    public function updateForum(Request $request)
    {
        // BODY JSON
        $forumId = $request->input('forumId');
        $header = $request->input('header');
        $content = $request->input('content');
        $orderNumber = $request->input('orderNumber');

        return response()->json(["message" => "Actualizado correctamente"], 200);
    }

    public function deleteForum(Request $request)
    {
        // BODY JSON
        $forumId = $request->input('forumId');

        return response()->json(["message" => "Eliminado correctamente"], 200);
    }

}

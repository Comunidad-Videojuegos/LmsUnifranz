<?php

namespace App\Http\Controllers\Smtp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Users\USR_Info;

class EmailController extends Controller
{
    public function sendNotification(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|email',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = USR_Info::find($request->input('userId'));

        if ($user) {
            $studentName = $user->firstName . ' ' . $user->dadLastName . ' ' . $user->momLastName;
        } else {
            $studentName = 'Usuario no encontrado';
        }

        // Formatear el mensaje
        $rawMessage = $request->input('message');
        $formattedMessage = nl2br(e($rawMessage)); // Convertir \n a <br> y escapar el contenido

        // Reemplazar el enlace por una etiqueta <a>
        $formattedMessage = preg_replace(
            '/(http?:\/\/[^\s]+)/',
            '<a href="$1">Enlace de actividad</a>',
            $formattedMessage
        );

        $messageContent = [
            'user_name' => $studentName,
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'message' => $formattedMessage,
        ];
        Mail::to($request->input('user'))->send(new HelloMail($messageContent));
        return response()->json(['message' => 'Notification Email Sent Successfully']);
    }

    public function sendAlert(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|email',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'file' => 'sometimes|array',
            'file.*' => 'file|max:10240', // limite de tamaño de archivo es de 10mb
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $messageContent = [
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'message' => $request->input('message'),
        ];

        $mail = new HelloMail($messageContent);

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $mail->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType(),
                ]);
            }
        }

        Mail::to($request->input('user'))->send($mail);
        return response()->json(['message' => 'Alert Email Sent Successfully']);
    }
}

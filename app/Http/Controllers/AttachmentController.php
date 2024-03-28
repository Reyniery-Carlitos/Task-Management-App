<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AttachmentController extends Controller
{
    // CREAR UN NUEVO ATTACHMENT
    public function store(Request $request) {
        try {   
            $request->validate([
                'urlFile' => 'required|file|mimes:jpg,jpeg,png,pdf',
                'task' => 'required|integer|exists:tasks,id'
            ]);

            $filePath = $request->file('urlFile')->store('uploads');

            $attachment = new Attachment();
            $attachment->urlFile = $filePath;
            $attachment->task = $request->task;

            $attachment->save();

        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    // ELIMINAR UN ATTACHMENT
    public function destroy(Attachment $attachment) {
        try {
            if ($attachment->urlFile) {
                Storage::delete($attachment->urlFile);
            }

            $attachment->delete();

            return response()->json([
                'message' => 'Attachment successfully deleted'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}

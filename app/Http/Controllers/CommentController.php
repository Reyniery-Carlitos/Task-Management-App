<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function listByTask ($idTask) {
        $comments = Comment::with('user')->where('task', $idTask)->get();

        return response()->json([
            'data' => $comments
        ]);
    }

    // ACTUALIZAR UN COMENTARIO
    public function update (Request $request, Comment $comment) {
        try {
            $request->validate([
                'content' => 'required|string',
                'task' => 'required|integer|exists:tasks,id',
                'user' => 'required|integer|exists:users,id'
            ]);
    
            $comment->update([
                'content' => $request->content,
                'task' => $request->task,
                'user' => $request->user
            ]);
    
            return response()->json([
                'data' => $comment,
                'message' => 'Comment successfully updated'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function actualizar (Comment $comment) {
        return view('comments.actualizar', compact('comment'));
    }

    // CREAR UN NUEVO COMENTARIO
    public function store (Request $request) {
        try {
            $request->validate([
                'content' => 'required|string',
                'task' => 'required|integer|exists:tasks,id',
                'user' => 'required|integer|exists:users,id'
            ]);
    
            $comment = Comment::create([
                'content' => $request->content,
                'task' => $request->task,
                'user' => $request->user
            ]);
    
            return response()->json([
                'data' => $comment,
                'message' => 'Comment successfully created'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function crear () {
        return view('comments.crear');
    }

    // ELIMINAR UN COMENTARIO
    public function destroy (Comment $comment) {
        try {
            $comment->delete();
            
            return response()->json([
                'message' => 'Comment successfully deleted'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function eliminar(Comment $comment) {
        return view('comments.eliminar', compact('comment'));
    }
}

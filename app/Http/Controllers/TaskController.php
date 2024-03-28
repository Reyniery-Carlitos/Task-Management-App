<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class TaskController extends Controller
{
    private $successMessage;
    private $notFoundMessage;

    public function __construct() {
        $this->successMessage = 'Tasks successfully returned';
        $this->notFoundMessage = 'Data not found';
    }

    public function listById($idTask) {
        try {
            $task = Task::with('dashboard', 'users', 'status', 'attachments', 'comments')->where('id', $idTask)->get();

            if (isset($task) && count($task) > 0) {
                return response()->json([
                    'data' => $task,
                    'message' => $this->successMessage
                ]);
            } else {
                return response()->json([
                    'message' => $this->notFoundMessage
                ], 404);
            }

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage() 
            ]);
        }
    }

    public function listByDashboard($idDashboard) {
        // $dashboard = Dashboard::findOrFail($idDashboard);
        // $tasks = $dashboard->tasks()->with('responsible', 'status', 'dashboard')->get();

        $tasks = Task::with('dashboard', 'users', 'status', 'comments', 'attachments')->where('dashboard', $idDashboard)->get();

        if (isset($tasks) && count($tasks) > 0) {
            return Inertia::render('Task/Task', [
                'tasks' => $tasks
            ]);
        } else {
            return response()->json([
                'message' => $this->notFoundMessage
            ], 404);
        }
    }

    public function listByStatus($idStatus) {
        $tasks = Task::with('dashboard', 'users', 'status')->where('status', $idStatus)->get();

        if (isset($tasks) && count($tasks) > 0) {
            return response()->json([
                'data' => $tasks,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->notFoundMessage
            ], 404);
        }
    }

    // ACTUALIZAR UN TASK
    public function update(Request $request, Task $task) {
        try {
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string',
                'dueDate' => 'required|date_format:Y-m-d',
                'status' => 'required|integer|exists:statuses,id',
                'dashboard' => 'required|integer|exists:dashboards,id'
            ]);
    
            $task->update([
                'title' => $request->title,
                'description' => $request->description,
                'dueDate' => $request->dueDate,
                'status' => $request->status,
                'dashboard' => $request->dashboard
            ]);
    
            return response()->json([
                'data' => $task,
                'message' => 'Task successfully updated'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function actualizar(Task $task) {
        return view('tasks.actualizar', compact('task'));
    }

    // CREAR UNA NUEVA TASK
    public function store(Request $request) {
        try {
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string',
                'dueDate' => 'required|date_format:Y-m-d',
                'status' => 'required|integer|exists:statuses,id',
                'dashboard' => 'required|integer|exists:dashboards,id'
            ]);
    
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'dueDate' => $request->dueDate,
                'status' => $request->status,
                'dashboard' => $request->dashboard
            ]);
    
            return response()->json([
                'data' => $task,
                'message' => 'Task successfully created'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function crear() {
        return view('tasks.crear');
    }

    // ELIMINAR UNA TASK
    public function destroy (Task $task) {
        try {
            $task->delete();

            return response()->json([
                'message' => 'Task successfully deleted'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function eliminar (Task $task) {
        return view('tasks.eliminar', compact('task'));
    } 
}

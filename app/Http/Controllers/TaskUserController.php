<?php

namespace App\Http\Controllers;

use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskUserController extends Controller
{
    // AGREGAR USUARIOS AL DASHBOARD
    public function store($idTask, $idUser) {
        try {
            $taskUser = TaskUser::create([
                'task' => $idTask,
                'user' => $idUser
            ]);
    
            return response()->json([
                'data' => $taskUser,
                'message' => 'User added to task successfully'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }
    }
    
    public function crear ($idTask, $idUser) {
        return view('taskUsers.crear', compact(['idTask', 'idUser']));
    }
    // ELIMINAR USARIOS DEL DASHBOARD
    public function destroy($idTask, $idUser) {
        try {
            DB::table('task_users')->where('task', $idTask)->where('user', $idUser)->delete();

            return response()->json([
                'message' => 'User deleted from task successfully'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }
    }

    
    public function eliminar ($idTask, $idUser) {
        return view('taskUsers.eliminar', compact(['idTask', 'idUser']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\DashboardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    // AGREGAR USUARIOS AL DASHBOARD
    public function store($idDashboard, $idUser) {
        try {
            $dashboardUser = DashboardUser::create([
                'dashboard' => $idDashboard,
                'user' => $idUser
            ]);
    
            return response()->json([
                'data' => $dashboardUser,
                'message' => 'User added to dashboard successfully'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }
    }

    public function crear($idDashboard, $idUser) {
        return view('dashboardUsers.crear', compact(['idDashboard', 'idUser']));
    }

    // ELIMINAR USARIOS DEL DASHBOARD
    public function destroy($idDashboard, $idUser) {
        try {
            DB::table('dashboard_user')->where('dashboard', $idDashboard)->where('user', $idUser)->delete();

            return response()->json([
                'message' => 'User deleted from dashboard successfully'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }
    }

    public function eliminar($idDashboard, $idUser) {
        return view('dashboardUsers.eliminar', compact(['idDashboard', 'idUser']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    private $successMessage;
    private $notFoundMessage;

    public function __construct(){
        $this->successMessage = 'Dashboards successfully returned';
        $this->notFoundMessage = 'Data not found';
    }

    public function listByOwner (Request $request) {
        $user = $request->user();
        
        if ($user) {
            $dashboards = Dashboard::where('owner', $user->id)->get();
            return Inertia::render('Dashboard/Dashboard', [
                'dashboards' => $dashboards
            ]);
        } 
    }

    public function listByEmployee ($idEmployee) {
        $user = User::findOrFail($idEmployee);
        $dashboards = $user->dashboardsByParticipants;

        if (isset($dashboards)) {
            return response()->json([
                'data' => $user,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->notFoundMessage
            ], 404);
        }
    }

    // ACTUALIZAR UN DASHBOARD
    public function update(Request $request, Dashboard $dashboard) {
        try {
            $request->validate([
                'title' => 'required|string|max:100',
                'description' => 'required|string',
                'owner' => 'required|integer|exists:users,id',
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            
            $dashboard->title = $request->title;
            $dashboard->owner = $request->owner;

            if ($request->hasFile('avatar')) {
                if ($dashboard->avatar) {
                    Storage::delete($dashboard->avatar);
                }

                $avatarPath = $request->file('avatar')->store('uploads');
                $dashboard->avatar = $avatarPath;
            }

            $dashboard->save();
    
            return response()->json([
                'data' => $dashboard,
                'message' => 'Dashboard successfully updated'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function actualizar (Dashboard $dashboard) {
        return view('dashboards.actualizar', compact('dashboard'));
    }
    
    // CREAR UN NUEVO DASHBOARD
    public function store(Request $request) {

        try {
            $request->validate([
                'title' => 'required|string|max:100',
                'description' => 'required|string',
                'owner' => 'required|integer|exists:users,id',
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
    
            // $dashboard = Dashboard::create([
            //     'title' => $request->title,
            //     'owner' => $request->owner,
            //     'avatar' => $request->avatar
            // ]);
            $avatarPath = $request->file('avatar')->store('uploads');

            $dashboard = new Dashboard();
            $dashboard->title = $request->title;
            $dashboard->owner = $request->owner;
            $dashboard->avatar = $avatarPath;
            $dashboard->save();
    
            return response()->json([
                'data' => $dashboard,
                'message' => 'Dashboard successfully created'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function create () {
        return Inertia::render('Dashboard/Create');
    }

    // ELIMINAR UN DASHBOARD
    public function destroy(Dashboard $dashboard) {
        try {
            if ($dashboard->avatar) {
                Storage::delete($dashboard->avatar);
            }

            $dashboard->delete();

            return response()->json([
                'message' => 'Dashboard successfully deleted'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function eliminar(Dashboard $dashboard) {
        return view('dashboards.eliminar', compact('dashboard'));
    }
}

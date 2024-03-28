<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $successMessage;
    private $noDataFoundMessage;

    public function __construct() {
        $this->successMessage = 'Roles successfully returned';
        $this->noDataFoundMessage = 'No data found';
    }
    
    public function list() {
        $roles = Role::all();

        if (isset($roles)) {
            return response()->json([
                'data' => $roles,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }
    }

    public function listById ($id) {
        $rol = Role::find($id);
        
        if (isset($rol)) {
            return response()->json([
                'data' => $rol,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }
    }
}

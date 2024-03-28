<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $successMessage;
    private $noDataFoundMessage;

    public function __construct() {
        $this->successMessage = 'Users succesfully returned';
        $this->noDataFoundMessage = 'No data found';
    }

    // FALTA MODIFICAR
    public function listByEmployees () {
        $users = User::role('Member')->get();

        if (isset($users)) {
            return response()->json([
                'data' => $users,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }
    }

    public function listByDashboard ($idDashboard) {
        $dashboard = Dashboard::findOrFail($idDashboard);
        $users = $dashboard->users;

        if (isset($dashboard)) {
            return response()->json([
                'data' => $dashboard,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }

    }

    public function listByAdmins () {
        $users = User::role('Admin')->with('roles:name')->get();

        if (isset($users)) {
            return response()->json([
                'data' => $users,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }
    }

    public function listByEmployeeId ($idEmployee) {
        $user = User::where('id', $idEmployee)->role('Member')->with('roles:name')->first();

        if (isset($user)) {
            return response()->json([
                'data' => $user,
                'message' => $this->successMessage
            ]);
        } else {
            return response()->json([
                'message' => $this->noDataFoundMessage
            ], 404);
        }
    }

    // ACTUALIZAR UN USUARIO
    public function update(Request $request, User $user) {
        try {
            $request->validate([
                'name' => 'required|string:50',
                'lastname' => 'required|string|max:50',
                'email' => 'required|email',
                'password' => 'required|string',
                'avatar' => 'required|image|mimes:jpeg,jpg,png|max:2048'
            ]);
    
            // $user->update($request->all());
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            if ($request->hasFile('avatar')) {
                if ($user->avatar) {
                    Storage::delete($user->avatar);
                }

                $avatarPath = $request->file('avatar')->store('uploads');
                $user->avatar = $avatarPath;
            }

            $user->save();
    
            return response()->json([
                'data' => $user,
                'message' => 'User successfully updated'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function actualizar(User $user) {
        return view('users.actualizar', compact('user'));
    }

    // CREAR UN USUARIO
    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string:50',
                'lastname' => 'required|string|max:50',
                'email' => 'required|email',
                'password' => 'required|string',
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'role' => 'required|string|exists:roles,name'
            ]);

            // Guardar la imagen en el servidor
            $avatarPath = $request->file('avatar')->store('uploads');
    
            // Crear el usuario con los datos del request
            // $user = User::create($request->all());
            $user = new User();
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->avatar = $avatarPath;
            $user->save();

            // Obtener el rol al que deseas asignarle al usuario
            $role = Role::where('name', $request->input('role'))->first();

            // Asignar el rol al usuario
            $user->assignRole($role);
    
            return response()->json([
                'data' => $user,
                'message' => 'User successfully created'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->errors()
            ], 422);
        }
    }

    public function crear() {
        return view('users.crear');
    }

    // ELIMINAR UN USER
    public function destroy (User $user) {
        try {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $user->delete();

            return response()->json([
                'message' => 'User successfully deleted'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function eliminar (User $user) {
        return view('users.eliminar', compact('user'));
    }
}

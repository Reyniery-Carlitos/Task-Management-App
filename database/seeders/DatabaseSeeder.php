<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Comment;
use App\Models\Dashboard;
use App\Models\DashboardUser;
use App\Models\Status;
use App\Models\Task;
use App\Models\TaskUser;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // ROLES
        $this->call(RoleSeeder::class);
        
        // USERS
        User::factory()->create([
            'name' => 'Carlos',
            'lastname' => 'Rubio',
            'email' => 'rubio@example.com',
            'avatar' => 'uploads/default.png',
            'password' => '1234',
        ])->assignRole('Admin');
        
        User::factory()->create([
            'name' => 'Juan',
            'lastname' => 'Perez',
            'email' => 'perez@example.com',
            'avatar' => 'uploads/logo.svg',
            'password' => '1234',
        ])->assignRole('Member');

        User::factory()->create([
            'name' => 'Pedro',
            'lastname' => 'Gomez',
            'email' => 'gomez@example.com',
            'password' => '1234',
            'avatar' => 'uploads/default.png',
        ])->assignRole('Member');

        User::factory()->create([
            'name' => 'Fulanito',
            'lastname' => 'Gonzales',
            'email' => 'gonzales@example.com',
            'password' => '1234',
            'avatar' => 'uploads/logo.svg',
        ])->assignRole('Member');

        User::factory()->create([
            'name' => 'Rodrigo',
            'lastname' => 'Hernandez',
            'email' => 'hernandez@example.com',
            'password' => '1234',
            'avatar' => 'uploads/default.png',
        ])->assignRole('Member');

        User::factory()->create([
            'name' => 'Bernardo',
            'lastname' => 'Silva',
            'password' => '1234',
            'email' => 'silva@example.com',
            'password' => '1234',
            'avatar' => 'uploads/logo.svg',
        ])->assignRole('Member');

        // STATUSES
        Status::factory()->create([
            'description' => 'Pending'
        ]);

        Status::factory()->create([
            'description' => 'Complete'
        ]);

        Status::factory()->create([
            'description' => 'Blocked'
        ]);

        Status::factory()->create([
            'description' => 'In Progress'
        ]);

        // DASHBOARDS
        Dashboard::factory()->create([
            'title' => 'Dashboard 1',
            'description' => 'Dashboard description',
            'owner' => 1,
            'avatar' => 'uploads/fondo.avif'
        ]);

        Dashboard::factory()->create([
            'title' => 'Dashboard 2',
            'description' => 'Description dashboard 2',
            'owner' => 1,
            'avatar' => 'uploads/fondo.avif'
        ]);
        
        // DASHBOARDSUSERS
        DashboardUser::factory()->create([
            'user' => 2,
            'dashboard' => 1
        ]);

        DashboardUser::factory()->create([
            'user' => 3,
            'dashboard' => 1
        ]);

        DashboardUser::factory()->create([
            'user' => 4,
            'dashboard' => 1
        ]);

        DashboardUser::factory()->create([
            'user' => 5,
            'dashboard' => 1
        ]);

        DashboardUser::factory()->create([
            'user' => 5,
            'dashboard' => 1
        ]);

        DashboardUser::factory()->create([
            'user' => 2,
            'dashboard' => 2
        ]);

        DashboardUser::factory()->create([
            'user' => 3,
            'dashboard' => 2
        ]);

        DashboardUser::factory()->create([
            'user' => 4,
            'dashboard' => 2
        ]);

        DashboardUser::factory()->create([
            'user' => 5,
            'dashboard' => 2
        ]);

        DashboardUser::factory()->create([
            'user' => 6,
            'dashboard' => 2
        ]);

        // TASKS
        Task::factory()->create([
            'title' => 'Tarea 1',
            'description' => 'Tarea 1 - Realizar las API de la app',
            'dueDate' => '2024-03-25',
            'status' => 1,
            'dashboard' => 1
        ]);

        Task::factory()->create([
            'title' => 'Tarea 2',
            'description' => 'Tarea 2 - Realizar el login',
            'dueDate' => '2024-03-25',
            'status' => 2,
            'dashboard' => 1
        ]);

        Task::factory()->create([
            'title' => 'Tarea 3',
            'description' => 'Tarea 3 - Testing',
            'dueDate' => '2024-03-25',
            'status' => 3,
            'dashboard' => 1
        ]);

        Task::factory()->create([
            'title' => 'Tarea 4',
            'description' => 'Tarea 4 - Crear los modelos de la base de datos',
            'dueDate' => '2024-03-25',
            'status' => 4,
            'dashboard' => 1
        ]);

        Task::factory()->create([
            'title' => 'Tarea 1',
            'description' => 'Tarea 1 - Realizar las API de la app',
            'dueDate' => '2024-03-25',
            'status' => 1,
            'dashboard' => 2
        ]);

        Task::factory()->create([
            'title' => 'Tarea 2',
            'description' => 'Tarea 2 - Realizar el login',
            'dueDate' => '2024-03-25',
            'status' => 2,
            'dashboard' => 2
        ]);

        Task::factory()->create([
            'title' => 'Tarea 3',
            'description' => 'Tarea 3 - Testing',
            'dueDate' => '2024-03-25',
            'status' => 1,
            'dashboard' => 2
        ]);

        Task::factory()->create([
            'title' => 'Tarea 4',
            'description' => 'Tarea 4 - Crear los modelos de la base de datos',
            'dueDate' => '2024-03-25',
            'status' => 2,
            'dashboard' => 2
        ]);

        // ATTACHMENTS
        Attachment::factory()->create([
            'urlFile' => '/uploads/default.png',
            'task' => 1
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/fondo.avif',
            'task' => 1
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/logo.svg',
            'task' => 2
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/default.png',
            'task' => 2
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/fondo.avif',
            'task' => 2
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/default.png',
            'task' => 3
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/logo.svg',
            'task' => 4
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/fondo.avif',
            'task' => 5
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/default.png',
            'task' => 6
        ]);

        Attachment::factory()->create([
            'urlFile' => '/uploads/logo.svg',
            'task' => 6
        ]);

        // COMMENTS
        Comment::factory()->create([
            'content' => 'Debes terminarlo lo mas rapido posible',
            'task' => 1,
            'user' => 2
        ]);

        Comment::factory()->create([
            'content' => 'Excelente!',
            'task' => 1,
            'user' => 3
        ]);

        Comment::factory()->create([
            'content' => 'Comentario 3',
            'task' => 2,
            'user' => 1
        ]);

        Comment::factory()->create([
            'content' => 'Necesitamos esto lo mas pronto posible',
            'task' => 2,
            'user' => 4
        ]);

        Comment::factory()->create([
            'content' => 'Ya casi esta',
            'task' => 3,
            'user' => 2
        ]);

        Comment::factory()->create([
            'content' => 'Buen trabajo',
            'task' => 3,
            'user' => 5
        ]);

        Comment::factory()->create([
            'content' => 'Excelente trabajo',
            'task' => 4,
            'user' => 3
        ]);

        Comment::factory()->create([
            'content' => 'Vas bien!',
            'task' => 4,
            'user' => 2
        ]);

        Comment::factory()->create([
            'content' => 'Podrias mejorar esto',
            'task' => 5,
            'user' => 5
        ]);

        Comment::factory()->create([
            'content' => 'Podrias mejorar esto',
            'task' => 6,
            'user' => 5
        ]);

        Comment::factory()->create([
            'content' => 'Podrias mejorar esto',
            'task' => 7,
            'user' => 1
        ]);

        Comment::factory()->create([
            'content' => 'Podrias mejorar esto',
            'task' => 8,
            'user' => 1
        ]);

        // TASKUSER
        TaskUser::factory()->create([
            'user' => 2,
            'task' => 1
        ]);

        TaskUser::factory()->create([
            'user' => 3,
            'task' => 1
        ]);

        TaskUser::factory()->create([
            'user' => 4,
            'task' => 2
        ]);

        TaskUser::factory()->create([
            'user' => 5,
            'task' => 2
        ]);

        TaskUser::factory()->create([
            'user' => 1,
            'task' => 3
        ]);

        TaskUser::factory()->create([
            'user' => 2,
            'task' => 3
        ]);

        TaskUser::factory()->create([
            'user' => 3,
            'task' => 3
        ]);

        TaskUser::factory()->create([
            'user' => 4,
            'task' => 4
        ]);

        TaskUser::factory()->create([
            'user' => 5,
            'task' => 4
        ]);

        TaskUser::factory()->create([
            'user' => 5,
            'task' => 6
        ]);

        TaskUser::factory()->create([
            'user' => 2,
            'task' => 6
        ]);

        TaskUser::factory()->create([
            'user' => 3,
            'task' => 7
        ]);

        TaskUser::factory()->create([
            'user' => 2,
            'task' => 8
        ]);

        TaskUser::factory()->create([
            'user' => 3,
            'task' => 8
        ]);

        TaskUser::factory()->create([
            'user' => 4,
            'task' => 8
        ]);

        TaskUser::factory()->create([
            'user' => 5,
            'task' => 8
        ]);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Dashboard;
use App\Models\Task;
use App\Models\Comment;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Devolver el rol de cada usuario
    // public function role () {
    //     // return $this->belongsTo(Rol::class, 'rol', 'id');
    //     return $this->roles()->first()->name;
    // }

    // Devolver los dashboards de cada usuario
    public function dashboardsByOwner () {
        return $this->hasMany(Dashboard::class, 'id');
    }

    // Devolver todas las tareas por usuario
    public function tasks () {
        return $this->belongsToMany(Task::class, 'task_users', 'user', 'task');
    }

    // Devolver todos los comentarios por user
    public function comments () {
        return $this->hasMany(Comment::class);
    }

    // Devolver los dashboards por user
    public function dashboardsByParticipants () {
        return $this->belongsToMany(Dashboard::class, 'dashboard_user', 'user', 'dashboard');
    }
}



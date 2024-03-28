<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class Dashboard extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'owner', 'avatar'];
    protected $hidden = ['created_at', 'updated_at'];

    // Devolver el owner por dashboard
    public function owner () {
        return $this->belongsTo(User::class);
    }

    // Devolver las tareas por dashboard
    public function tasks () {
        return $this->hasMany(Task::class, 'id');
    }

    // Devolver los users por dashboards
    public function users () {
        return $this->belongsToMany(User::class, 'dashboard_user', 'dashboard', 'user');
    }
}

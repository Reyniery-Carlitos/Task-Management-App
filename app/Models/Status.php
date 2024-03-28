<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Status extends Model
{
    use HasFactory;

    protected $hidden = ([
        'created_at',
        'updated_at'
    ]);

    // Devolver todas las tareas por status
    public function tasks () {
        return $this->hasMany(Task::class);
    }
}

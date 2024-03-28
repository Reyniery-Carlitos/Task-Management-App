<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'task', 'user'];
    protected $hidden = ['created_at', 'updated_at'];
    
    // Devolver la tarea por cada comentario
    public function task () {
        return $this->belongsTo(Task::class, 'id');
    }

    // Devolver el usuario de cada comentario
    public function user () {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}

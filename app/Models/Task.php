<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Attachment;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'dueDate', 'status', 'dashboard'];
    protected $hidden = ['created_at', 'updated_at'];

    // Devolver el status por tarea
    public function status () {
        return $this->belongsTo(Status::class, 'status', 'id');
    }

    // Devolver el responsable por tarea
    public function users () {
        return $this->belongsToMany(User::class, 'task_users', 'task', 'user');
    }

    // Devolver el dashboard por tarea
    public function dashboard () {
        return $this->belongsTo(Dashboard::class, 'dashboard', 'id');
    }

    // Devolver los comentarios por tarea
    public function comments () {
        return $this->hasMany(Comment::class, 'task')->with('user');
    }

    // Devolver los attachments relacionados a cada tarea
    public function attachments () {
        return $this->hasMany(Attachment::class, 'task');
    }

    // Modificadores
    protected function dueDate() {
        set: function($value) {
            $str = explode("/", $value);
            $result = (explode(':', $str[2])[0]).'-'.$str[1].'-'.$str[0];
            return $result;
        };
    }
}

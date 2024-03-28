<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Attachment extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];

    // Devolver la tarea del attachment
    public function task () {
        return $this->belongsTo(Task::class, 'task');
    }
}

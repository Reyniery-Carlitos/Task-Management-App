<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;

    protected $fillable = ['user', 'task'];

    protected $hidden = ['created_at', 'updated_at'];
}

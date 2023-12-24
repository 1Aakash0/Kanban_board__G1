<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    use HasFactory;
    public function task() {
        return $this->hasOne(task::class, 'id', 'task_id');
    }

    public function project() {
        return $this->hasOne(project::class, 'id', 'project_id');
    }

    public function cuss_id() {
        return $this->hasOne(User::class, 'id', 'cus_id');
    }
}

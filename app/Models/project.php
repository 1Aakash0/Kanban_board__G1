<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    public function pm_ids() {
        return $this->hasOne(User::class, 'id', 'pm_id');
    }

    public function cus_id() {
        return $this->hasOne(User::class, 'id', 'u_id');
    }
}

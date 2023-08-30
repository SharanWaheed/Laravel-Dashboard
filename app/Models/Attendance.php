<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
    use HasFactory;
}

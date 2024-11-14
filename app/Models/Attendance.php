<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['time', 'status', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

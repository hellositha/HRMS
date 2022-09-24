<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    use HasFactory;

    protected $fillable = ['department_id','name','employee_id'];

    public function department()
    {
        return $this->belongsTo(department::class);

    }
    public function employee()
    {
        return $this->belongsTo(employee::class);
    }
}


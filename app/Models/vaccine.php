<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaccine extends Model
{
    use HasFactory;

    //protected $guarded = [];
   protected $fillable = ['employee_id','vaccine','product_name','date','healthcare_professional'];

   public function employee()
    {
       return $this->belongsTo(employee::class);

    }

}

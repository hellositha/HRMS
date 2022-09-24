<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'department_id',
        'zip_code',
        'birth_date',
        'date_hired',
        'vaccine',
];

public function country()
{
    return $this->belongsTo(country::class);
}

public function state()
{
    return $this->belongsTo(state::class);
}

public function city()
{
    return $this->belongsTo(city::class);
}
public function department()
{
    return $this->belongsTo(department::class);
}
//public function vaccine()
//{
 //   return $this->belongsTo(vaccine::class);
//}



}

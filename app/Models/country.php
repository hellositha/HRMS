<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;

  //  protected $guarded = [];

    protected $fillable = ['country_code','name'];

  //  public function state()
   // {
    //    return $this->belongsTo(State::class);
    //}

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
 //   public function states()
 //   {
  //      return $this->hasMany(state::class);
   // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class physician extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'department_id', 'specialty_id'];

    public function department()
    {
        return $this -> hasMany(department::class);
    }
    public function specialty()
    {
        return $this -> hasMany(specialty::class);
    }
}

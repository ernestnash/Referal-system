<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class physician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'contact',
        'department_id',
        'specialty_id'
    ];

    public function department()
    {
        return $this -> belongsTo(department::class);
    }
    public function specialty()
    {
        return $this -> belongsTo(specialty::class);
    }
}

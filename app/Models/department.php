<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function physician()
    {
        return $this -> hasMany(physician::class);
    }
    public function specialty()
    {
        return $this -> hasMany(specialty::class);
    }

}

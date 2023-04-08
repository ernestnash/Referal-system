<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialty extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function physician()
    {
        return $this -> hasMany(physician::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class labreport extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'physician_id', 'specimen_id', 'labtech_id','report'];

    public function patient()
    {
        return $this -> hasMany(patient::class);
    }

    public function physician()
    {
        return $this -> hasMany(physician::class);
    }

    public function specimen()
    {
        return $this -> hasMany(specimen::class);
    }
    public function labtech()
    {
        return $this -> hasMany(labtech::class);
    }
}

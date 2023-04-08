<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referalrequests extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'physician_id', 'specimen_id', 'patientrecord_id', 'Referal-type', 'Destination'];

    public function patient()
    {
        return $this -> hasMany(patient::class);
    }

    public function physician()
    {
        return $this -> hasMany(physician::class);
    }

    public function patientrecords()
    {
        return $this -> hasMany(patientrecords::class);
    }
    public function specimen()
    {
        return $this -> hasMany(specimen::class);
    }
}

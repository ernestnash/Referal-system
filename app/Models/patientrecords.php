<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientrecords extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'physician_id', 'labreport_id', 'department_id', 'Diagnosis', 'prescription'];

    public function patient()
    {
        return $this -> hasMany(patient::class);
    }

    public function physician()
    {
        return $this -> hasMany(physician::class);
    }

    public function labreport()
    {
        return $this -> hasMany(labreport::class);
    }
    public function department()
    {
        return $this -> hasMany(department::class);
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientrecords extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'physician_id', 'labreport_id', 'department_id', 'Diagnosis', 'Prescription'];

    public function patient()
    {
        return $this -> belongsTo(patient::class);
    }

    public function physician()
    {
        return $this -> belongsTo(physician::class);
    }

    public function labreport()
    {
        return $this -> belongsTo(labreport::class);
    }
    public function department()
    {
        return $this -> belongsTo(department::class);
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referalrequests extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'physician_id', 'specimen_id', 'patientrecords_id', 'Referal-type', 'Destination'];

    public function patient()
    {
        return $this -> belongsTo(patient::class);
    }

    public function physician()
    {
        return $this -> belongsTo(physician::class);
    }

    public function patientrecords()
    {
        return $this -> belongsTo(patientrecords::class);
    }
    public function specimen()
    {
        return $this -> belongsTo(specimen::class);
    }
}

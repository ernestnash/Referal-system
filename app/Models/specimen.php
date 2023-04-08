<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specimen extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'specimen_type'];

    public function patient()
    {
        return $this-> belongsTo(patient::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'age', 
        'date_of_birth', 
        'gender',
        'county', 
        'city', 
        'identification_method', 
        'identification_no',  
        'contact', 
        'next_of_kin_name', 
        'relationship', 
        'kin_contact', 
        'alternative_contact'];
}

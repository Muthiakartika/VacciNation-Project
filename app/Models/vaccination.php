<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'patientName',
        'email',
        'batchNo',
        'appointmentDate',
        'vaccineDose',
        'status',
        'remarks',
    ];
}

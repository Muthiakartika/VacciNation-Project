<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaccination extends Model
{
    use HasFactory;

    protected $table = 'vaccinations';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'batchNo',
        'appointmentDate',
        'vaccineDose',
        'status',
        'remarks',
        'name',
    ];
}

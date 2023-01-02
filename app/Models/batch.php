<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'vaccineName',
        'centreName',
        'batchNo',
        'expiryDate',
        'qtyAvailable',
        'qtyAdministered',
    ];
}

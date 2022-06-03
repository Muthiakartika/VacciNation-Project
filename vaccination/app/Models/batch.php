<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    protected $table = 'batches';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'batchNo',
        'expiryDate',
        'qtyAvailable',
        'qtyAdministered',
        'vaccineName',
        'centreName',
    ];
}

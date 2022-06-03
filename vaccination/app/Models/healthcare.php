<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class healthcare extends Model
{
    use HasFactory;

    protected $table = 'healthcares';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'centreName',
        'address',
        'phone',
        'optDay',
        'img',
    ];

}

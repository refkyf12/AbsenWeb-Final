<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numbers extends Model
{
    use HasFactory;

    protected $table = 'unique_number';

    protected $fillable = [
        'id',
        'input_number',
        'output_number',
    ];
}

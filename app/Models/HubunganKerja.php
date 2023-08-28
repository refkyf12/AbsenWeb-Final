<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubunganKerja extends Model
{
    use HasFactory;
    protected $table = 'hubungan_kerja';

    protected $fillable = [
        'id',
        'atasan_id',
        'bawahan_id',
    ];

    public function atasan(){
        return $this->belongsTo(User::class, 'atasan_id');
    }
    public function bawahan(){
        return $this->belongsTo(User::class, 'bawahan_id');
    }
}
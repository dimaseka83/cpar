<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan_detail extends Model
{
    use HasFactory;
    protected $fillable = ['phone', 'open_day', 'open_hour'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about_ceo extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'image', 'name_ceo', 'position_ceo'];
}

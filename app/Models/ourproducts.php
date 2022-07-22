<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ourproducts extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name_prod', 'desc_prod', 'img_prod'];
}

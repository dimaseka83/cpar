<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companyinf extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'title_reg', 'title_vat', 'title_databox', 'title_additional',];
}

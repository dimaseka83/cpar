<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getLaporan()
    {
        return response()->json(laporan::all());
    }
}

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

    public function postLaporan(Request $request)
    {
        try {
            if(isset($request->id)){
                $laporan = laporan::find($request->id);
                $laporan->update($request->all());
            }else{
                $laporan = laporan::create($request->all());
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    public function postLaporanDelete(Request $request)
    {
        try {
            laporan::destroy($request->id);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}

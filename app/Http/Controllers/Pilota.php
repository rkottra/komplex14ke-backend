<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Pilota extends Controller
{
    public function getPilotak(Request $request) {
        
        $query = $request->input('q');
        
        if ($query == "") {
            $pilotak = DB::select("SELECT * FROM versenyzok");
        } else {
            $pilotak = DB::select("SELECT * FROM versenyzok WHERE nemzet = ?", array($query));
        }
        return $pilotak;
    }
}

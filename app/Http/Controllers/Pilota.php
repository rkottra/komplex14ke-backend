<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Pilota extends Controller
{
    public function getPilotak(Request $request) {
        
        $query = $request->input('q');
        
        if ($query == "") {
            $pilotak = DB::select("SELECT versenyzok.ID, versenyzok.nev, versenyzok.nemzet, 
                                            versenyzok.szuletes, versenyzok.magassag,
                                            csapatok.csapatID, csapatok.csapatnev, 
                                            csapatok.nemzet AS 'csapatnemzet'
                                    FROM versenyzok 
                                    INNER JOIN csapatok ON csapatok.csapatid = versenyzok.csapat");
        } else {
            $pilotak = DB::select("SELECT versenyzok.ID, versenyzok.nev, versenyzok.nemzet, 
                                            versenyzok.szuletes, versenyzok.magassag,
                                            csapatok.csapatID, csapatok.csapatnev, 
                                            csapatok.nemzet AS 'csapatnemzet'
                                    FROM versenyzok 
                                    INNER JOIN csapatok ON csapatok.csapatid = versenyzok.csapat 
                                    WHERE versenyzok.nemzet = ?", array($query));
        }
        return $pilotak;
    }
}

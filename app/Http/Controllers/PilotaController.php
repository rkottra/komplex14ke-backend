<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pilota;
use App\Models\Csapat;

class PilotaController extends Controller
{
    public function getPilotak(Request $request) {
        
        

        $query = $request->input('q');
        
        if ($query == "") {

            return Pilota::with('csapat')->get();
            /*$pilotak = DB::select("SELECT versenyzok.ID, versenyzok.nev, versenyzok.nemzet, 
                                            versenyzok.szuletes, versenyzok.magassag,
                                            csapatok.csapatID, csapatok.csapatnev, 
                                            csapatok.nemzet AS 'csapatnemzet'
                                    FROM versenyzok 
                                    INNER JOIN csapatok ON csapatok.csapatid = versenyzok.csapat");*/
        } else {
            return Pilota::with('csapat')->where('nemzet', $query)->get();
            /*$pilotak = DB::select("SELECT versenyzok.ID, versenyzok.nev, versenyzok.nemzet, 
                                            versenyzok.szuletes, versenyzok.magassag,
                                            csapatok.csapatID, csapatok.csapatnev, 
                                            csapatok.nemzet AS 'csapatnemzet'
                                    FROM versenyzok 
                                    INNER JOIN csapatok ON csapatok.csapatid = versenyzok.csapat 
                                    WHERE versenyzok.nemzet LIKE ? 
                                    OR versenyzok.nev LIKE ?
                                    OR versenyzok.magassag = ?", array("%".$query."%",
                                                                       "%".$query."%",
                                                                       $query));*/
        }
    }

    public function deletePilota($id) {

        $deleted = DB::table('versenyzok')->where('id', $id)->delete();

        //return DB::delete("DELETE FROM versenyzok WHERE id = ?", array($id));
    }

    public function insertPilota() {
        
        $requestPayload = file_get_contents("php://input");
        $pilota = json_decode($requestPayload)->params->ujpilota;

        DB::table('versenyzok')->insert([(array)$pilota]);
        return DB::table('versenyzok')->latest('ID')->first();

       /* return DB::insert("INSERT INTO versenyzok (nev, szuletes, csapat) VALUES (?, ?, ?)",
                         array($pilota->nev, $pilota->szuletes, $pilota->csapat));*/
    }

    public function updatePilota() {
        
        $requestPayload = file_get_contents("php://input");
        $pilota = json_decode($requestPayload)->params->ujpilota;
        
        DB::table('versenyzok')
            ->where('ID', $pilota->ID)
            ->update([(array)$pilota]);

        return DB::table('versenyzok')->latest('ID')->first();
    }
}

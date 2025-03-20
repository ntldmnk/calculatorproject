<?php

namespace App\Http\Controllers;

use App\Models\etkezesiNaplo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OsszesitesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return etkezesiNaplo::all();
    }

    public function getById($etkezesiNaploID)
    {
        $osszesites = etkezesiNaplo::find($etkezesiNaploID);
        if(is_null($osszesites))
        {
            return response()->json(['Hiba:'=>'Étel nem található!'],404);
        }
        
        return response()->json($osszesites,201);
    }

    public function destroy(int $id)
    {
        $osszesites = etkezesiNaplo::find($id);
    
        if (!$osszesites) {
            return response()->json(['message' => 'Az étel nem létezik!'], 404);
        }
    
        $osszesites->delete();
        return response()->json(['message'=> 'Sikeres törlés!'], 204);
    }
    

    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),
        [ 
            
            'etkezesiNaploNev'=>'required',
            'regForeignId'=>'required',
            'etelekForeignId'=>'required',
            'etkezesiNaploIDeje'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message' => 'Kötelező adat hiányzik'], 400);
        }

        $osszesites = etkezesiNaplo::create($request->all());
        return response()->json(['id' => $osszesites->etkezesiNaploID],202);
    }

    public function update(Request $request, $id)
    {
        $osszesites = etkezesiNaplo::find($id);
        if(is_null($osszesites))
                return response()->json(['Üzenet:'=>'Nem létezik az összesítés!'],404);
        
        $validator = Validator::make($request->all(),
        [
            
            'etkezesiNaploNev'=>'required',
            'regForeignId'=>'required',
            'etelekForeignId'=>'required',
            'etkezesiNaploIDeje'=>'required'
        ]
        );
        if($validator->fails()){
            return response()->json(['message' => 'kötelező adatok hiányoznak'],402);
        }

        $osszesites -> update($request->all());
        return response()->json(['Következő id-jű összesítés adatai módosultak' => $osszesites->etkezesiNaploID],201);
    }
    public function searchbyname(string $etkezesiNaploNev){
        $osszesites=etkezesiNaplo::where('etkezesiNaploNev',$etkezesiNaploNev)->first();

        if(is_null($osszesites)){
            return response()->json(['message'=>'osszesites nem talalhato'],404);
        }
        return response()->json($osszesites,200);
    }
}

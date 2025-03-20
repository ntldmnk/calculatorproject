<?php

namespace App\Http\Controllers;

use App\Models\Osszetevo;
use App\Models\koret_osszetevo_kapcsolat;
use App\Models\etel_osszetevo_kapcsolat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OsszetevoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Osszetevo::all();
    }
    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),
        [
           
            'osszetevoNev'=>'required',
            'osszetevoTipus'=>'required',
            'osszetevoEnergia'=>'required',
            'oszetevoFeherje'=>'required',
            'osszetevoZsir'=>'required',
            'osszetevoSzenhidrat'=>'required'
           
        ]);

        if($validator->fails())
        {
            return response()->json(['message' => 'Kötelező adat hiányzik'], 400);
        }

        $osszetevo = Osszetevo::create($request->all());
        return response()->json(['id' => $osszetevo->osszetevoID],202);
    }
    public function getById(int $id)
    {
        $osszetevo = Osszetevo::find($id);
        if(is_null($osszetevo))
        {
            return response()->json(['Hiba:'=>'Étel nem található!'],404);
        }
        
        return response()->json($osszetevo,201);
    }
    public function destroy(int $id)
    {
        $osszetevo = Osszetevo::find($id);
    
        if (!$osszetevo) {
            return response()->json(['message' => 'Az fiók nem létezik!'], 404);
        }
    
        $osszetevo->delete();
        return response()->json(['message' => 'Sikeres torlés'], 204);
    }
    public function update(Request $request, $id)
    {
        $osszetevo = Osszetevo::find($id);
        if(is_null($osszetevo))
                return response()->json(['Üzenet:'=>'Nem létezik az osszetevo!'],404);
        
        $validator = Validator::make($request->all(),
        [
            
            'osszetevoNev'=>'required',
            'osszetevoTipus'=>'required',
            'osszetevoEnergia'=>'required',
            'oszetevoFeherje'=>'required',
            'osszetevoZsir'=>'required',
            'osszetevoSzenhidrat'=>'required'
        ]
        );
        if($validator->fails()){
            return response()->json(['message' => 'kötelező adatok hiányoznak'],402);
        }

        $osszetevo -> update($request->all());
        return response()->json(['Következő id-jű osszetevo adatai módosultak' => $osszetevo->osszesitevoId],201);
    }
    public function searchbyname(string $osszetevoNev){
        $osszetevo=Osszetevo::where('osszetevoNev',$osszetevoNev)->first();

        if(is_null($osszetevo)){
            return response()->json(['message'=>'osszetevo nem talalhato'],404);
        }
        return response()->json($osszetevo,200);
    }
    
    
}

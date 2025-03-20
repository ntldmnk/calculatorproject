<?php

namespace App\Http\Controllers;

use App\Models\Koret;
use App\Models\etel_koret_kapcsolat;
use App\Models\koret_osszetevo_kapcsolat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KoretController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Koret::all();
    }

    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),
        [
            
            'koretNev'=>'required',
            'koretEnergia'=>'required',
            'koretFeherje'=>'required',
            'koretZsir'=>'required',
            'koretSzenhidrat'=>'required',
            'koretVegan'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['message' => 'Kötelező adat hiányzik'], 400);
        }

        $koret = Koret::create($request->all());
        return response()->json(['id' => $koret->koretID],202);
    }

    public function getById($id)
    {
        $koret = Koret::find($id);
        if(is_null($koret))
        {
            return response()->json(['Hiba:'=>'Étel nem található!'],404);
        }
        
        return response()->json($koret,201);
    }
    public function destroy(int $id)
    {
        $koret = Koret::find($id);
    
        if (!$koret) {
            return response()->json(['message' => 'Az étel nem létezik!'], 404);
        }
    
        $koret->delete();
        return response()->json(['message'=> 'Sikeres törlés!'], 204);
    }
    public function update(Request $request, $id)
    {
        $koret = Koret::find($id);
        if(is_null($koret))
                return response()->json(['Üzenet:'=>'Nem létezik az köret!'],404);
        
        $validator = Validator::make($request->all(),
        [
            
            'koretNev'=>'required',
            'koretEnergia'=>'required',
            'koretFeherje'=>'required',
            'koretZsir'=>'required',
            'koretSzenhidrat'=>'required',
            'koretVegan'=>'required',
        ]
        );
        if($validator->fails()){
            return response()->json(['message' => 'kötelező adatok hiányoznak'],402);
        }

        $koret -> update($request->all());
        return response()->json(['Következő id-jű köretek adatai módosultak' => $koret->koretID],201);
    }
    public function searchbyname(string $koretNev){
        $koret=Koret::where('koretNev',$koretNev)->first();

        if(is_null($koret)){
            return response()->json(['message'=>'Koret nem talalhato'],404);
        }
        return response()->json($koret,200);
    }
}

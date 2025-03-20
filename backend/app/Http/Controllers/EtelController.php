<?php

namespace App\Http\Controllers;

use App\Models\Etel;
use App\Models\etel_koret_kapcsolat;
use App\Models\etel_osszetevo_kapcsolat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EtelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Etel::all();
    }

    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),
        [
            
            'etelNev'=>'required',
            'etelEnergia'=>'required',
            'etelFeherje'=>'required',
            'etelZsir'=>'required',
            'etelSzenhidrat'=>'required',
            'etelVegan'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message' => 'Kötelező adat hiányzik'], 400);
        }

        $etel = Etel::create($request->all());
        return response()->json(['id' => $etel->etelID],202);
    }

    public function getById(int $id)
    {
        $etel = Etel::find($id);
        if(is_null($etel))
        {
            return response()->json(['Hiba:'=>'Étel nem található!'],404);
        }
        
        return response()->json($etel,201);
    }
    public function destroy(int $id)
    {
        $etel = Etel::find($id);
    
        if (!$etel) {
            return response()->json(['message' => 'Az étel nem létezik!'], 404);
        }
    
        $etel->delete();
        return response()->json(['message'=> 'Sikeres törlés!'], 204);
    }
    public function update(Request $request, $id)
    {
        $etel = Etel::find($id);
        if(is_null($etel))
                return response()->json(['Üzenet:'=>'Nem létezik az étel!'],404);
        
        $validator = Validator::make($request->all(),
        [
            
            'etelNev'=>'required',
            'etelEnergia'=>'required',
            'etelFeherje'=>'required',
            'etelZsir'=>'required',
            'etelSzenhidrat'=>'required',
            'etelVegan'=>'required'
        ]
        );
        if($validator->fails()){
            return response()->json(['message' => 'kötelező adatok hiányoznak'],402);
        }

        $etel -> update($request->all());
        return response()->json(['Következő id-jű ételek adatai módosultak' => $etel->etelID],201);
    }

    public function searchbyname(string $etelNev){
        $etel=Etel::where('etelNev',$etelNev)->first();

        if(is_null($etel)){
            return response()->json(['message'=>'Etel nem talalhato'],404);
        }
        return response()->json($etel,200);
    }
}
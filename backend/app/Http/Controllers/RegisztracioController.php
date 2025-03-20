<?php

namespace App\Http\Controllers;

use App\Models\Regisztracio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisztracioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Regisztracio::all();
    }
    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),
        [
            
            'email' => 'required',
            'jelszo'=>'required',
            'felhasznaloNev' => 'required',
            'testsuly' => 'required',
            'testmagassag' => 'required',
            'eletkor' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['message' => 'Kötelező adat hiányzik'], 400);
        }

        $reg = Regisztracio::create($request->all());
        return response()->json(['id' => $reg->regisztracioID],202);
    }
    public function login(Request $request)
    {
        
        $adatok = $request->only('felhasznaloNev', 'jelszo');
    
       
        $user = Regisztracio::where('felhasznaloNev', $adatok['felhasznaloNev'])->first();
    
        if ($user && $user->jelszo === $adatok['jelszo']) {
            
            return response()->json(['user' => $user], 200);
        }
    
       
        return response()->json(['error' => 'Rossz adatok'], 401);
    }
    public function getById($regisztracioID)
    {
        $reg = Regisztracio::find($regisztracioID);
        if(is_null($reg))
        {
            return response()->json(['Hiba:'=>'Regisztráció nem található!'],404);
        }
        
        return response()->json($reg,201);
    }

    public function destroy(int $id)
{
    $reg = Regisztracio::find($id);

    if (!$reg) {
        return response()->json(['message' => 'Az fiók nem létezik!'], 404);
    }

    $reg->delete();
    return response()->json(null, 204);
}
public function update(Request $request, $id)
    {
        $reg = Regisztracio::find($id);
        if(is_null($reg))
                return response()->json(['Üzenet:'=>'Nem létezik a reg!'],404);
        
        $validator = Validator::make($request->all(),
        [
            'nev'=>'required',
            'email' => 'required',
            'jelszo'=>'required',
            'felhasznaloNev' => 'required',
        ]
        );
        if($validator->fails()){
            return response()->json(['message' => 'kötelező adatok hiányoznak'],402);
        }

        $reg -> update($request->all());
        return response()->json(['Következő id-jű reg adatai módosultak' => $reg->regisztracioID],201);
    }
    public function searchbyname(string $felhNev){
        $reg=Regisztracio::where('felhNev',$felhNev)->first();

        if(is_null($reg)){
            return response()->json(['message'=>'Felhasználó nem talalhato'],404);
        }
        return response()->json($reg,200);
    }


}

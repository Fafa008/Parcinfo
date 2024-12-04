<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MaterielController extends Controller
{
    public function create() {
    $departements = Departement::all();
    return view('Projet.Materiel.insert', compact('departements'));
}

    public function store(Request $request){
        $departement = Departement::findOrFail($request->departement_id);
        $mat = new Materiel;
        $mat->nom_Mat = $request->nom_Mat;
        $mat->serial_number = $request->serial_number;
        $mat->description = $request->description;
        $mat->garentie = $request->garentie;
        $mat->statue = $request->statue;
        $mat->departement_id = $departement->id;
        $mat->date_integration = $request->date_integration;

        $mat->save();

        return redirect()->route('Materiels');
    }

    public function showMateriel(){
        $mats = Materiel::all();
        return view('Projet.Materiel.materiel', ['materiel' => $mats]);
    }
    public function destroy($id){
        $mat = Materiel::find($id);

        if ($mat) {
            $mat->delete();
            return redirect()->route('Materiels')->with('success', 'Post supprimé avec succès');
            DB::statement("ALTER TABLE materiels AUTO_INCREMENT = 1");
        } else {
            return redirect()->route('Materiels')->with('error', 'Utilisateur non trouvé');
        }
    }
     function edit(Materiel $mat){
        $departements = Departement::all();
        return view ('Mat.edit', [
            'mat' => $mat,
            ['departements' => $departements]
        ]);
     }


    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'id' => 'required|int',
            'nom_Mat' => 'required|max:255',
            'serial_number' => 'required',
            'description' => 'required',
            'garentie' => 'required',
            'departement_id' => 'required',
            'statue' => 'required',
            'date_integration' => 'required',


    ]);
    Materiel::whereId($id)->update($validatedData);
        return redirect()->route('Materiels')->with('success', 'Voiture mise à jour avec succèss');
    }
}

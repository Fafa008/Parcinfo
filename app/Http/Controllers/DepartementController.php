<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{
    public function create(){
        return view('Projet.Departement.departement');
    }

    public function store(Request $request){
        $dep = new Departement;
        $dep->nom_dep = $request->nom_dep;

        $dep->save();
        return redirect()->route('Departement');
    }

    public function showDepartement(){
        $dep = Departement::all();
        $departements = DB::table('departements')
        ->leftJoin('materiels', 'departements.id', '=', 'materiels.departement_id')
        ->select('departements.nom_dep', 'materiels.nom_Mat', 'materiels.description')
        ->orderBy('departements.nom_dep')
        ->get();
        return view('Projet.Departement.departement', ['departement' => $dep,'departements' => $departements]);
    }
    public function destroy($id){
        $dep = Departement::find($id);

        if ($dep) {
            $dep->delete();
            return redirect()->route('Departement')->with('success', 'Post supprimé avec succès');
            DB::statement("ALTER TABLE departements AUTO_INCREMENT = 1");
        } else {
            return redirect()->route('Departement')->with('error', 'Utilisateur non trouvé');
        }
    }
     function edit(Departement $dep){
        return view ('Dep.edit', [
            'dep' => $dep
        ]);
     }


    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'id' => 'required|int',
            'nom_dep' => 'required|max:255'

    ]);
    Departement::whereId($id)->update($validatedData);
        return redirect()->route('Departement')->with('success', 'Voiture mise à jour avec succèss');
    }
}

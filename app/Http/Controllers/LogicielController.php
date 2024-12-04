<?php

namespace App\Http\Controllers;

use App\Models\Logiciel;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogicielController extends Controller
{
    public function create(){
        return view('Projet.Logiciel.logiciel');
    }

    public function store(Request $request){
        $log = new Logiciel;
        $log->nom_logiciel = $request->nom_logiciel;
        $log->version = $request->version;
        $log->description = $request->description;
        $log->date_achat = $request->date_achat;

        $log->save();

        return redirect()->route('Logiciel');
    }

    public function showLogiciel(){
        $logs = Logiciel::all();
        return view('Projet.Logiciel.Logiciel', ['logiciel' => $logs]);
    }
    public function destroy($id){
        $log = Logiciel::find($id);

        if ($log) {
            $log->delete();
            return redirect()->route('Logiciel')->with('success', 'Post supprimé avec succès');
            DB::statement("ALTER TABLE logiciels AUTO_INCREMENT = 1");
        } else {
            return redirect()->route('Logiciel')->with('error', 'Utilisateur non trouvé');
        }
    }
     function edit(Logiciel $log){
        return view ('Log.edit', [
            'log' => $log
        ]);
     }


    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'id' => 'required|int',
            'nom_logiciel' => 'required|max:255',
            'version' => 'required',
            'date_achat' => 'required',


    ]);
    Materiel::whereId($id)->update($validatedData);
        return redirect()->route('Logiciel')->with('success', 'Voiture mise à jour avec succèss');
    }
}

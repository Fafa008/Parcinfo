<?php

namespace App\Http\Controllers;
use App\Models\Logiciel;
use App\Models\Materiel;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    public function create()
    {
        $materiels = Materiel::all();

        return view('Projet.Maintenance.Maintenance', compact('materiels'));
    }

    public function store(Request $request)
    {
        $mai = new Maintenance;

        $materiel = Materiel::findOrFail($request->materiel_id);

        $mai->materiel_id = $materiel->id;
        $mai->description = $request->description;
        $mai->start_date = $request->start_date;
        $mai->end_date = $request->end_date;

        $mai->save();

        return redirect()->route('Maintenance');
    }

    public function showMaintenance(){
        $mai = Maintenance::all();
        return view('Projet.Maintenance.Maintenance', ['maintenance' => $mai]);
    }
    public function destroy($id){
        $mai = Maintenance::find($id);


        if ($mai) {
            $mai->delete();
            return redirect()->route('Maintenance')->with('success', 'Post supprimé avec succès');
            DB::statement("ALTER TABLE maintenances AUTO_INCREMENT = 1");
        } else {
            return redirect()->route('Maintenance')->with('error', 'Utilisateur non trouvé');
        }
    }
     function edit(Maintenance $mai){
        return view ('Mai.edit', [
            'mai' => $mai
        ]);
     }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'id' => 'required|int',
            'materiel_id' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date ' => 'required',
    ]);
    Maintenance::whereId($id)->update($validatedData);
        return redirect()->route('Maintenance')->with('success', 'Voiture mise à jour avec succèss');
    }
}

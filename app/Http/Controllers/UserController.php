<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function create(){
        return view('Projet.user');
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('Projet.index');
    }

    public function showUser(){
        $users = User::all();
        return view('Projet.admin', ['users' => $users]);
    }
    public function destroy($id){
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('/UserInsert')->with('success', 'Post supprimé avec succès');
        } else {
            return redirect('/UserInsert')->with('error', 'Utilisateur non trouvé');
        }
    }
     function edit(User $user){
        return view ('Projet.edit', [
            'user' => $user
        ]);
     }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'id' => 'required|int',
            'name' => 'required|max:255',
            'email' => 'required'
    ]);
        User::whereId($id)->update($validatedData);
        return redirect('/Admin')->with('success', 'Voiture mise à jour avec succèss');
    }

}



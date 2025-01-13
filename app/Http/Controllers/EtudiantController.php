<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{

    public function liste_etudiant()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant()
    {
        return view('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'filiere' => 'required',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->filiere = $request->filiere;
        $etudiant->save();

        return redirect('/etudiant')->with('status', 'L\'étudiant a été ajouté avec succès.');
    }

    public function modifier_etudiant($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiant.modifier', compact('etudiant'));
    }

    public function modifier_etudiant_traitement(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'filiere' => 'required',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->filiere = $request->filiere;
        $etudiant->save();

        return redirect('/etudiant')->with('status', 'L\'étudiant a été modifié avec succès.');
    }

    public function supprimer_etudiant($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect('/etudiant')->with('status', 'L\'étudiant a été supprimé avec succès.');
    }
}


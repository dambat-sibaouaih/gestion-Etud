<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

Route::get('/etudiant', [EtudiantController::class, 'liste_etudiant']);
Route::get('/ajouter', [EtudiantController::class, 'ajouter_etudiant']);
Route::post('/ajouter/traitement', [EtudiantController::class, 'ajouter_etudiant_traitement']);
Route::get('/modifier/{id}', [EtudiantController::class, 'modifier_etudiant'])->name('modifier_etudiant');
Route::post('/modifier/{id}', [EtudiantController::class, 'modifier_etudiant_traitement']);
Route::post('/supprimer/{id}', [EtudiantController::class, 'supprimer_etudiant'])->name('supprimer_etudiant');

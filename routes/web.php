<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[AdminController::class,'index'])->name('register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/Accueil',[AdminController::class,'Accueil'])->name('Accueil');

Route::get('/Inscription',[AdminController::class,'inscription'])->name('inscription');

Route::get('/Matiere',[AdminController::class,'matiere'])->name('matiere');

Route::get('/Classe',[AdminController::class,'classe'])->name('classe');

Route::get('/Droit',[AdminController::class,'droit'])->name('droit');

Route::get('/Examen',[AdminController::class,'examen'])->name('examen');

Route::get('/Professeur',[AdminController::class,'professeur'])->name('professeur');

Route::get('/notes',[AdminController::class,'notes'])->name('notes');

Route::get('/listeProfesseur',[AdminController::class,'listeProfesseur'])->name('listeProfesseur');

Route::get('/listeEtudiant',[AdminController::class,'listeEtudiant'])->name('listeEtudiant');

Route::get('/detailProfesseur/{id}',[AdminController::class,'detailProfesseur'])->name('detailProfesseur');

Route::get('/detailEtudiant/{id}',[AdminController::class,'detailEtudiant'])->name('detailEtudiant');

Route::get('/SaisonExamen',[AdminController::class,'saison'])->name('saison');

Route::get('/Payement',[AdminController::class,'payement'])->name('payement');

Route::post('/AjoutMatiere',[AdminController::class,'AjoutMatiere'])->name('AjoutMatiere');

Route::post('/AjoutClasse',[AdminController::class,'AjoutClasse'])->name('AjoutClasse');

Route::post('/AjoutDroit',[AdminController::class,'AjoutDroit'])->name('AjoutDroit');

Route::post('/AjoutSaison',[AdminController::class,'ajoutSaison'])->name('ajoutSaison');

Route::post('/AjoutExamen',[AdminController::class,'AjoutExamen'])->name('AjoutExamen');

Route::post('/ajoutProfs',[AdminController::class,'ajoutProfs'])->name('ajoutProfs');

Route::post('/inscrire',[AdminController::class,'inscrire'])->name('inscrire');

Route::post('/nouveauPay',[AdminController::class,'nouveauPay'])->name('nouveauPay');

Route::post('/ajoutNote',[AdminController::class,'ajoutNote'])->name('ajoutNote');

Route::get('/supprimeMatiere/{id}',[AdminController::class,'supprimeMatiere'])->name('supprimeMatiere');

Route::get('/supprimer/{id}',[AdminController::class,'supprClasses'])->name('supprClasses');

Route::get('/supprimeDroit/{id}',[AdminController::class,'supprimeDroit'])->name('supprimeDroit');

Route::get('/supprimeSaison/{id}',[AdminController::class,'supprimeSaison'])->name('supprimeSaison');

Route::get('/supprimerExam/{id}',[AdminController::class,'supprimerExam'])->name('supprimerExam');

Route::get('/supprimerProfesseur/{id}',[AdminController::class,'supprimerProfesseur'])->name('supprimerProfesseur');

Route::get('/supprimerEtudiant/{id}',[AdminController::class,'supprimerEtudiant'])->name('supprimerEtudiant');

Route::get('/editMatiere/{id}',[AdminController::class,'editMatiere'])->name('editMatiere');

Route::get('/Edit/{id}',[AdminController::class,'editClasse'])->name('editClasse');

Route::get('/editDroit/{id}',[AdminController::class,'editDroit'])->name('editDroit');

Route::get('/EditSaison/{id}',[AdminController::class,'editSaison'])->name('editSaison');

Route::get('/EditExamen/{id}',[AdminController::class,'editExamen'])->name('editExamen');

Route::get('/editProfesseur/{id}',[AdminController::class,'editProfesseur'])->name('editProfesseur');

Route::get('/editEtudiant/{id}',[AdminController::class,'editEtudiant'])->name('editEtudiant');

Route::post('/modifieMatiere/{id}',[AdminController::class,'modifieMatiere'])->name('modifieMatiere');

Route::post('/modifieClasse/{id}',[AdminController::class,'modifieClasse'])->name('modifieClasse');

Route::post('/modifieDroit/{id}',[AdminController::class,'modifieDroit'])->name('modifieDroit');

Route::post('/modifieSaison/{id}',[AdminController::class,'modifieSaison'])->name('modifieSaison');

Route::post('/modifieExamen/{id}',[AdminController::class,'modifieExamen'])->name('modifieExamen');

Route::post('/modifieProfes/{id}',[AdminController::class,'modifieProfes'])->name('modifieProfes');

Route::post('/modifieEtudiant/{id}',[AdminController::class,'modifieEtudiant'])->name('modifieEtudiant');
<?php

use App\helpers\MyNotifications;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\AffectationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\BonController;
use App\Http\Controllers\RapportVehiculesController;
use App\Http\Controllers\FiltreController;
use App\Http\Controllers\RapportMaintenancesController;


use App\Models\Affectation;
use App\Models\Chauffeur;
use App\Models\Incident;
use App\Models\Mission;
use App\Models\Vehicule;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login-page',[UserController::class,'showLoginForm'])->name('login-page');
Route::post('/authentication', [UserController::class,'authenticate'])->name('authentication');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/', [DashboardController::class, 'index'])->name('home')->middleware('auth');

/* Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); */
//MARQUES
Route::get('/marques', [MarqueController::class, 'list'])->name('marques.list');
// Afficher le formulaire de création d'une nouvelle marque
Route::get('/formulaire', [MarqueController::class, 'formulaire'])->name('marques.formulaire');
// Enregistrer une nouvelle marque
Route::post('/marques', [MarqueController::class, 'store'])->name('marques.store');
// Afficher une seule marque
Route::get('/detail', [MarqueController::class, 'detail'])->name('marques.detail');
// Afficher le formulaire de modification d'une marque
Route::get('/edit{marque}', [MarqueController::class, 'edit'])->name('marques.edit');
// Mettre à jour une marque existante
Route::put('/update{marque}', [MarqueController::class, 'update'])->name('marques.update');
// Supprimer une marque
Route::delete('/marques/{marque}', [MarqueController::class, 'destroy'])->name('marques.destroy');
// export
Route::get('/export/pdf', [ExportController::class, 'exportPDF'])->name('export.pdf');
Route::get('/export/excel', [ExportController::class, 'exportExcel'])->name('export.excel');
// MODELES
Route::get('/modeles', [ModeleController::class, 'list'])->name('modeles.list');
Route::get('/formulaire', [ModeleController::class, 'formulaire'])->name('modeles.formulaire');
Route::post('/modeles', [ModeleController::class, 'store'])->name('modeles.store');
Route::get('/detail', [ModeleController::class, 'detail'])->name('modeles.detail');
Route::get('/edit/{modele}', [ModeleController::class, 'edit'])->name('modeles.edit');
Route::put('/update/{modele}', [ModeleController::class, 'update'])->name('modeles.update');
Route::delete('/modeles/{modele}', [ModeleController::class, 'destroy'])->name('modeles.destroy');
// SERVICES
Route::get('/services', [ServiceController::class, 'list'])->name('services.list');
Route::get('/formulaire', [ServiceController::class, 'formulaire'])->name('services.formulaire');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/detail', [ServiceController::class, 'detail'])->name('services.detail');
Route::get('/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/update', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
// PRESTATAIRES
Route::get('/prestataires', [PrestataireController::class, 'list'])->name('prestataires.list');
Route::get('/formulaire', [PrestataireController::class, 'formulaire'])->name('prestataires.formulaire');
Route::post('/prestataires', [PrestataireController::class, 'store'])->name('prestataires.store');
Route::get('/detail', [PrestataireController::class, 'detail'])->name('prestataires.detail');
Route::get('/prestataires/edit/{prestataire}', [PrestataireController::class, 'edit'])->name('prestataires.edit');
Route::put('/prestataires/update/{prestataire}', [PrestataireController::class, 'update'])->name('prestataires.update');
Route::delete('/prestataires/{prestataire}', [PrestataireController::class, 'destroy'])->name('prestataires.destroy');
//VEHICULES
Route::get('/vehicules', [VehiculeController::class, 'list'])->name('vehicules.list');
Route::get('vehicules/formulaire', [VehiculeController::class, 'formulaire'])->name('vehicules.formulaire');
Route::post('/vehicules', [VehiculeController::class, 'store'])->name('vehicules.store');
Route::post('/vehicules/vidange', [VehiculeController::class, 'vidange'])->name('vehicules.vidange');

Route::get('vehicules/detail', [VehiculeController::class, 'detail'])->name('vehicules.detail');
Route::get('vehicules/edit/{vehicule}', [VehiculeController::class, 'edit'])->name('vehicules.edit');
Route::put('vehicules/update/{vehicule}', [VehiculeController::class, 'update'])->name('vehicules.update');
Route::delete('/vehicules/{vehicule}', [VehiculeController::class, 'destroy'])->name('vehicules.destroy');
//AFFECTATIONS
Route::get('/affectations', [AffectationController::class, 'list'])->name('affectations.list');
Route::get('/formulaire', [AffectationController::class, 'create'])->name('affectations.formulaire');
Route::post('/affectations', [AffectationController::class, 'store'])->name('affectations.store');
Route::get('/detail', [AffectationController::class, 'detail'])->name('affectations.detail');
Route::get('affectations/edit/{affectation}', [AffectationController::class, 'edit'])->name('affectations.edit');
Route::put('affectations/update/{affectation}', [AffectationController::class, 'update'])->name('affectations.update');
Route::delete('/affectations/{affectation}', [AffectationController::class, 'destroy'])->name('affectations.destroy');

//Chauffeurs
Route::get('/chauffeurs', [ChauffeurController::class, 'list'])->name('chauffeurs.list');
Route::get('chauffeurs/formulaire', [ChauffeurController::class, 'formulaire'])->name('chauffeurs.formulaire');
Route::post('/chauffeurs', [ChauffeurController::class, 'store'])->name('chauffeurs.store');
Route::get('chauffeurs/detail', [ChauffeurController::class, 'detail'])->name('chauffeurs.detail');
Route::get('chauffeurs/edit/{chauffeur}', [ChauffeurController::class, 'edit'])->name('chauffeurs.edit');
Route::put('chauffeurs/update/{chauffeur}', [ChauffeurController::class, 'update'])->name('chauffeurs.update');
Route::delete('/chauffeurs/{chauffeur}', [ChauffeurController::class, 'destroy'])->name('chauffeurs.destroy');
//MISSIONS
Route::get('/missions', [MissionController::class, 'list'])->name('missions.list');
Route::get('missions/formulaire', [MissionController::class, 'formulaire'])->name('missions.formulaire');
Route::post('/missions', [MissionController::class, 'store'])->name('missions.store');
Route::post('/missions/confirmation', [MissionController::class, 'confirmation'])->name('missions.confirmation');
Route::get('missions/detail', [MissionController::class, 'detail'])->name('missions.detail');
Route::get('missions/edit/{mission}', [MissionController::class, 'edit'])->name('missions.edit');
Route::put('missions/update{mission}', [MissionController::class, 'update'])->name('missions.update');
Route::delete('/missions/{mission}', [MissionController::class, 'destroy'])->name('missions.destroy');
//MAINTENANCES
Route::get('/maintenances', [MaintenanceController::class, 'list'])->name('maintenances.list');
Route::get('maintenances/formulaire', [MaintenanceController::class, 'formulaire'])->name('maintenances.formulaire');
Route::post('/maintenances', [MaintenanceController::class, 'store'])->name('maintenances.store');
Route::get('maintenances/detail', [MaintenanceController::class, 'detail'])->name('maintenances.detail');
Route::get('maintenances/edit/{maintenance}', [MaintenanceController::class, 'edit'])->name('maintenances.edit');
Route::put('maintenances/update/{maintenance}', [MaintenanceController::class, 'update'])->name('maintenances.update');
Route::delete('/maintenances{maintenance}', [MaintenanceController::class, 'destroy'])->name('maintenances.destroy');

//CATEGORIE
Route::get('/categories', [CategorieController::class, 'list'])->name('categories.list');
Route::get('categories/formulaire', [CategorieController::class, 'formulaire'])->name('categories.formulaire');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('categories/detail', [CategorieController::class, 'detail'])->name('categories.detail');
Route::get('categories/edit/{categorie}', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('categories/update/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');
//Assurances
Route::get('/assurances', [AssuranceController::class, 'list'])->name('assurances.list');
Route::get('assurances/formulaire', [AssuranceController::class, 'formulaire'])->name('assurances.formulaire');
Route::post('/assurances', [AssuranceController::class, 'store'])->name('assurances.store');
Route::get('assurances/detail', [AssuranceController::class, 'detail'])->name('assurances.detail');
Route::get('assurances/edit/{assurance}', [AssuranceController::class, 'edit'])->name('assurances.edit');
Route::put('assurances/update/{assurance}', [AssuranceController::class, 'update'])->name('assurances.update');
Route::delete('/assurances{assurance}', [AssuranceController::class, 'destroy'])->name('assurances.destroy');
<<<<<<< HEAD

//Incidents  
=======
//Incidents
>>>>>>> 454a4a7dc7ae8b5ad9e3339a56722d783dae4678
Route::get('/incidents', [IncidentController::class, 'list'])->name('incidents.list');
Route::get('incidents/formulaire', [IncidentController::class, 'formulaire'])->name('incidents.formulaire');
Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
Route::get('/incidents/detail/{id_incident}', [IncidentController::class, 'detail'])->name('incidents.detail');
Route::get('incidents/edit/{incident}', [IncidentController::class, 'edit'])->name('incidents.edit');
Route::put('incidents/update/{incident}', [IncidentController::class, 'update'])->name('incidents.update');
Route::delete('/incidents{incident}', [IncidentController::class, 'destroy'])->name('incidents.destroy');
//Incidents
Route::get('/bons', [BonController::class, 'list'])->name('bons.list');
Route::get('bons/formulaire', [BonController::class, 'formulaire'])->name('bons.formulaire');
Route::post('/bons', [BonController::class, 'store'])->name('bons.store');
Route::get('/bons/detail/{id_bon}', [BonController::class, 'detail'])->name('bons.detail');
Route::get('bons/edit/{bon}', [BonController::class, 'edit'])->name('bons.edit');
Route::put('bons/update/{bon}', [BonController::class, 'update'])->name('bons.update');
Route::delete('/bons{bon}', [BonController::class, 'destroy'])->name('bons.destroy');

Route::get('/rapport/vehicules', [RapportVehiculesController::class, 'afficherRapport'])->name('rapport.vehicules');
Route::get('/rapport/maintenances', [RapportMaintenancesController::class, 'afficherRapport'])->name('rapport.maintenances');


<<<<<<< HEAD

=======
>>>>>>> 454a4a7dc7ae8b5ad9e3339a56722d783dae4678
